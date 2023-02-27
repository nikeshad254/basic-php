<?php
require_once 'db.php';
session_start();

if(!isset($_SESSION['data'])){
    header('Location:login.php');
}
if(isset($_GET['id'])){

    $uid = mysqli_real_escape_string($conn,$_GET['id']);

    $sql = "select * from users where id = $uid";
    $exec = $conn->query($sql);

    if($exec->num_rows > 0){
        //sucess in log in 

        $data  = $exec->fetch_object();      //data session has all data now


    }
}
else{
    header('Location:index.php');
}

// unedited old tala xa

if (isset($_POST['update'])) {

    if (isset($_FILES['profile'])) {
        $path = 'upload/';
        $temp_path = $_FILES['profile']['tmp_name'];
        $extn = pathinfo($_FILES['profile']['full_path'], PATHINFO_EXTENSION);


        $profile = ($extn!='' && isset($temp_path)) ? $_POST['fname'] . '_' . date('YmdHis') . '.' . $extn : $data->profile;

        $send_path = $path . $profile;
    }



    $data = [
        'fname' => mysqli_real_escape_string($conn,$_POST['fname']),
        'lname' => mysqli_real_escape_string($conn,$_POST['lname']),
        'email' => mysqli_real_escape_string($conn,$_POST['email']),
        'pass' => mysqli_real_escape_string($conn,$_POST['password']),
        'contact' => mysqli_real_escape_string($conn,$_POST['mobile']),
        'gender' => mysqli_real_escape_string($conn,$_POST['gender']),
        'address' => mysqli_real_escape_string($conn,$_POST['address']),
        'state' => mysqli_real_escape_string($conn,$_POST['state']),
        'profile' => mysqli_real_escape_string($conn,$profile),
        'hobbies' => mysqli_real_escape_string($conn,implode(',', $_POST['hobbies']))
    ];

    // update TABLENAME set C1 = VAL1, C2 = VAL2 ... where id = GETID;
    
    $sql = 'update users set ';
    foreach($data as $key => $value){
        $sql .= $key.'='. "'$value' ,";

    }
    
    $sql = rtrim($sql, ',' );

    $sql .= "where id = ".$_GET['id'];
    
    if (!is_null($profile)){
        $update = $conn->query($sql);
    }

}


?>

<!DOCTYPE html>
<html>

<head>
    <title>LearnVern | Advanced PHP Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">LearnVern</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <a class="btn btn-success" href="index.php">Index</a>
                <a class="btn btn-success" href="logout.php">logout</a>
                <!-- <a  class="btn btn-success" href="registration.html">Register</a> -->
            </div>
        </div>
    </nav>

    <div class="album py-5 bg-light">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card border-success" style="max-width: 65rem;padding: 2%;">
                <h2> Registration </h2>
                <hr>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <?php

                        if(isset($_POST['update'])){
                            if($update){
                                move_uploaded_file($temp_path,$send_path);
                                header('Location:index.php');
                            }
                            else{
                                echo ' <div class="alert alert-danger" role="alert">
                                        Something went wrong!
                                    </div>';
                            }
                        }
                        
                        
                        ?>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" value="<?php echo $data->fname ?>" class="form-control" id="fname" name="fname" placeholder="Meet" required="">
                            </div>
                            <div class="col">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" value="<?php echo $data->lname ?>" class="form-control" id="lname" name="lname" placeholder="Shah" required="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="<?php echo $data->email ?>" class="form-control" id="email" name="email" placeholder="name@example.com" required="">
                            </div>
                            <div class="col">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" value="<?php echo $data->pass ?>" class="form-control" id="password" name="password" placeholder="password" required="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="mobile" class="form-label">Contact Number</label>
                                <input type="tel" value="<?php echo $data->contact ?>" class="form-control" id="mobile" name="mobile" placeholder="1234567890" required="">
                            </div>
                            <div class="col">
                                <label for="gender" class="form-label">Gender</label><br>
                                <input type="radio" id="gender" name="gender" value="Male" <?php if($data->gender == 'Male'){echo "checked";} ?> >Male
                                <input type="radio" id="gender" name="gender" value="Female" <?php if($data->gender == 'Female'){echo "checked";} ?> >Female
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" rows="3" name="address" placeholder="address" required=""><?php echo $data->address ?></textarea>
                            </div>
                            <div class="col">
                                <label for="inputState" class="form-label">State</label>
                                <select class="form-select" id="inputState" name="state" aria-label="Default select example" required="">
                                    <option disabled>Select</option>
                                    <option value="gj" <?php if($data->state == 'gj'){echo "selected";} ?> >Gujarat</option>
                                    <option value="dl" <?php if($data->state == 'dl'){echo "selected";} ?> >Delhi</option>
                                    <option value="rj" <?php if($data->state == 'rj'){echo "selected";} ?> >Rajasthan</option>
                                    <option value="mh" <?php if($data->state == 'mh'){echo "selected";} ?> >Maharashtra</option>
                                    <option value="sk" <?php if($data->state == 'sk'){echo "selected";} ?> >Sikkim</option>
                                    <option value="pb" <?php if($data->state == 'pb'){echo "selected";} ?> >Punjab</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="profile" class="form-label">Profile</label><br>
                                <input type="file" class="form-control-file" name="profile" id="profile">
                            </div>
                            <div class="col">
                                <label for="hobbies" class="form-label">Hobbies</label><br>
                                <?php 
                                $hobby= explode(',',$data->hobbies);
                                ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hobbies[]" value="Travelling" <?php if(in_array('Travelling',$hobby)){echo "checked";} ?> >
                                    <label class="form-check-label" for="inlineCheckbox1">Travelling</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="hobbies[]" value="Music" <?php if(in_array('Music',$hobby)){echo "checked";} ?> >
                                    <label class="form-check-label" for="inlineCheckbox2">Music</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="hobbies[]" value="Coding" <?php if(in_array('Coding',$hobby)){echo "checked";} ?> >
                                    <label class="form-check-label" for="inlineCheckbox3">Coding</label>
                                </div>
                            </div>

                        </div><br>
                        <div class="mb-3">
                            <input type="submit" name="update" id="update" value="update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer bg-dark" style="padding-top: 20px;">
        <div class="container">
            <span class="text-muted">Made by Meet Shah - <a href="https://www.learnvern.com/"> LearnVern </a> using <a href="https://getbootstrap.com/">Bootstrap</a>.</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
</body>

</html>