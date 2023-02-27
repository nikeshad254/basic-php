<?php
require_once 'db.php';
session_start();


if (isset($_POST['regist'])) {

    if (isset($_FILES['profile'])) {
        $path = 'upload/';
        $temp_path = $_FILES['profile']['tmp_name'];
        $extn = pathinfo($_FILES['profile']['full_path'], PATHINFO_EXTENSION);


        $profile = (isset($temp_path)) ? $_POST['fname'] . '_' . date('YmdHis') . '.' . $extn : null;

        $send_path = $path . $profile;
    }



    $data = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'email' => $_POST['email'],
        'pass' => $_POST['password'],
        'contact' => $_POST['mobile'],
        'gender' => $_POST['gender'],
        'address' => $_POST['address'],
        'state' => $_POST['state'],
        'profile' => $profile,
        'hobbies' => implode(',', $_POST['hobbies'])
    ];

    // insert tblname (cols) values ('data');
    $cols = implode(',', array_keys($data));
    $vals = implode("','", array_values($data));

    $sql = "insert users ($cols) values ('$vals')";

    if (!is_null($profile)){
        $add = $conn->query($sql);
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
                <a class="btn btn-success" href="login.html">Login</a>
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

                        if(isset($_POST['regist'])){
                            if($add){
                                move_uploaded_file($temp_path,$send_path);
                               echo ' <div class="alert alert-success" role="alert">
                                        Data added sucessfully now login!
                                    </div>';
                                header("Refresh:2;url=login.php");
                            }
                            else{
                                echo ' <div class="alert alert-danger" role="alert">
                                        Something went wrong!
                                    </div>';
                                header('Refresh:2;url=registration.php');
                            }
                        }
                        
                        
                        ?>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Meet" required="">
                            </div>
                            <div class="col">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Shah" required="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required="">
                            </div>
                            <div class="col">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password" required="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="mobile" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="1234567890" required="">
                            </div>
                            <div class="col">
                                <label for="gender" class="form-label">Gender</label><br>
                                <input type="radio" id="gender" name="gender" value="Male" checked>Male
                                <input type="radio" id="gender" name="gender" value="Female">Female
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" rows="3" name="address" placeholder="address" required=""></textarea>
                            </div>
                            <div class="col">
                                <label for="inputState" class="form-label">State</label>
                                <select class="form-select" id="inputState" name="state" aria-label="Default select example" required="">
                                    <option selected disabled>Select</option>
                                    <option value="gj">Gujarat</option>
                                    <option value="dl">Delhi</option>
                                    <option value="rj">Rajasthan</option>
                                    <option value="mh">Maharashtra</option>
                                    <option value="sk">Sikkim</option>
                                    <option value="pb">Punjab</option>
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
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hobbies[]" value="Travelling">
                                    <label class="form-check-label" for="inlineCheckbox1">Travelling</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="hobbies[]" value="Music">
                                    <label class="form-check-label" for="inlineCheckbox2">Music</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="hobbies[]" value="Coding">
                                    <label class="form-check-label" for="inlineCheckbox3">Coding</label>
                                </div>
                            </div>

                        </div><br>
                        <div class="mb-3">
                            <input type="submit" name="regist" id="regist" value="Registration" class="btn btn-primary">
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