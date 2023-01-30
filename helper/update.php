<?php
session_start();
require_once 'db.php';

if(isset($_GET['user'])){
  $uid = mysqli_real_escape_string($con,$_GET['user']);
  $select_user = "SELECT * FROM users WHERE id=$uid";
  $select_exec = $con->query($select_user);
  $user_data = $select_exec->fetch_object();

}else{
  header('Location:display.php');
}

if(isset($_POST['regist'])){

  $path = 'upload/';

  $extention = pathinfo($_FILES['profile']['name'],PATHINFO_EXTENSION);
  $file_name = $_POST['fname'].'_'.date('YmdHis').'.'.$extention;
  $profile = (file_exists($_FILES['profile']['tmp_name']))?$file_name: $user_data->profile;


  $update_data = [

    'fname' => mysqli_real_escape_string($con,$_POST['fname']),
    'lname' => mysqli_real_escape_string($con,$_POST['lname']),
    'email' => mysqli_real_escape_string($con,$_POST['email']),
    'password' => mysqli_real_escape_string($con,$_POST['password']),
    'phone' => mysqli_real_escape_string($con,$_POST['phone']),
    'gender' => mysqli_real_escape_string($con,$_POST['gender']),
    'address' => mysqli_real_escape_string($con,$_POST['address']),
    'state' => mysqli_real_escape_string($con,$_POST['state']),
    'profile' => mysqli_real_escape_string($con,$profile),
  ];
  
  $sql = "UPDATE users SET ";
  foreach($update_data as $key => $value){
    $sql .= "$key = '$value',";
  }
  $sql = rtrim($sql,',');
  $sql .= "WHERE id=".$uid; 
  $exec = $con->query($sql);

  if($exec){
    if(!is_null($profile)){
      move_uploaded_file($_FILES['profile']['tmp_name'],$path.$file_name);
    }
    echo '<div class="alert alert-success" role="alert">
    Data updated sucessfully!
  </div>';
  header("refresh:1,url:display.php");
  }else{
    echo '<div class="alert alert-success" role="alert">
    something went wrong!
  </div>';
    header("refresh:1,url:display.php");
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">

    <title>Update</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand">Learn-Vern</a>
        <?php 
          if(isset($_SESSION['user_data'])){
            echo '<form class="d-flex">
            <button class="btn btn-outline-success" type="submit"><a href="display.php">Display</a></button>
    </form>';
            echo '<form class="d-flex">
            <button class="btn btn-outline-success" type="submit"><a href="logout.php">Log Out</a></button>
    </form>';
          }
        ?>
        
      </div>
    </nav>
    
    <h3 class="m-2">Update</h3>
    <hr>
    <form class="row g-3 m-2" method="POST" enctype="multipart/form-data">
        <div class="mb-3 col-md-4">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $user_data->fname; ?>" >
          </div>
          <div class="mb-3 col-md-4">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $user_data->lname; ?>">
          </div><hr>

          <div class="mb-3 col-md-4">
            <label for="email" class="form-label">email
            </label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $user_data->email; ?>">
          </div>
          <div class="mb-3 col-md-4">
            <label for="password" class="form-label">password</label>
            <input type="password" class="form-control" name="password" id="password" value="<?php echo $user_data->password; ?>">
          </div><hr>
          <div class="mb-3 col-md-5">
            <label for="phone" class="form-label">phone
            </label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user_data->phone; ?>">
          </div>

          <div class="form-check ">
            <input class="form-check-input" type="checkbox" name="gender" id="gender" value="male"
            <?php if($user_data->gender == 'male'){echo 'checked';}?>
            >
            <label class="form-check-label" for="flexCheckDefault">
              Male
            </label>
          </div>
          <div class="form-check ">
            <input class="form-check-input" type="checkbox" name="gender" id="gender"  value="female" 
            <?php if($user_data->gender == 'female'){echo 'checked';}?> >
            <label class="form-check-label" for="flexCheckChecked">
              Female
            </label>
          </div>

          <div class="mb-3 col-md-5">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address" id="address" rows="3"><?php echo $user_data->address;?></textarea>
          </div>

          <select class="form-select" aria-label="Default select example" name="state" id="state">
            <option >State</option>
            <option value="ktm"<?php if($user_data->state == 'ktm'){echo 'selected';}?>>ktm</option>
            <option value="pkhra"<?php if($user_data->state == 'pkhra'){echo 'selected';}?>>pkh</option>
            <option value="btwal"<?php if($user_data->state == 'btwal'){echo 'selected';}?>>btwl</option>
          </select>

          <div class="mb-3">
            <img src="upload/<?php echo $user_data->profile; ?>" height="80px" width="80px" alt="">
            <label for="profile" class="form-label">upload file</label>
            <input class="form-control" type="file" name="profile" id="profile">
          </div>

          <div class="mb-3">
            <input type="submit" name="update" id="update" value="update" class="btn btn-primary">
          </div>
      </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>