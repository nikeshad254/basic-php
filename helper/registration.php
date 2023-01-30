<?php
session_start();
require_once 'db.php';

if(isset($_POST['regist'])){

  $path = 'upload/';

  $extention = pathinfo($_FILES['profile']['name'],PATHINFO_EXTENSION);
  $file_name = $_POST['fname'].'_'.date('YmdHis').'.'.$extention;
  $profile = (file_exists($_FILES['profile']['tmp_name']))?$file_name:NULL;


  $insert_data = [

    'fname' => $_POST['fname'],
    'lname' => $_POST['lname'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'phone' => $_POST['phone'],
    'gender' => $_POST['gender'],
    'address' => $_POST['address'],
    'state' => $_POST['state'],
    'profile' => $profile,
  ];
  
  $cols = implode(',',array_keys($insert_data));
  $vals = implode("','",array_values($insert_data));
  $sql = "INSERT INTO users($cols) VALUES ('$vals')";
  $insert = mysqli_query($con,$sql);

  if($insert){
    if(!is_null($profile)){
      move_uploaded_file($_FILES['profile']['tmp_name'],$path.$file_name);
    }
    echo '<div class="alert alert-success" role="alert">
    Data inserted sucessfully!
  </div>';
  }else{
    echo '<div class="alert alert-success" role="alert">
    something went wrong!
  </div>';
    header("refresh:3,url:registration.php");
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

    <title>Registration</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand">Learn-Vern</a>
        <form class="d-flex">
                <button class="btn btn-outline-success" type="submit"><a href="index.php">Login</a></button>
        </form>
      </div>
    </nav>
    
    <h3 class="m-2">Registration</h3>
    <hr>
    <form class="row g-3 m-2" method="POST" enctype="multipart/form-data">
        <div class="mb-3 col-md-4">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" >
          </div>
          <div class="mb-3 col-md-4">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" >
          </div><hr>

          <div class="mb-3 col-md-4">
            <label for="email" class="form-label">email
            </label>
            <input type="email" class="form-control" name="email" id="email" >
          </div>
          <div class="mb-3 col-md-4">
            <label for="password" class="form-label">password</label>
            <input type="password" class="form-control" name="password" id="password" >
          </div><hr>
          <div class="mb-3 col-md-5">
            <label for="phone" class="form-label">phone
            </label>
            <input type="text" class="form-control" name="phone" id="phone" >
          </div>

          <div class="form-check ">
            <input class="form-check-input" type="checkbox" name="gender" id="gender" value="male">
            <label class="form-check-label" for="flexCheckDefault">
              Male
            </label>
          </div>
          <div class="form-check ">
            <input class="form-check-input" type="checkbox" name="gender" id="gender"  value="female" >
            <label class="form-check-label" for="flexCheckChecked">
              Female
            </label>
          </div>

          <div class="mb-3 col-md-5">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address" id="address" rows="3"></textarea>
          </div>

          <select class="form-select" aria-label="Default select example" name="state" id="state">
            <option selected>State</option>
            <option value="ktm">ktm</option>
            <option value="pkhra">pkh</option>
            <option value="btwal">btwl</option>
          </select>

          <div class="mb-3">
            <label for="profile" class="form-label">upload file</label>
            <input class="form-control" type="file" name="profile" id="profile">
          </div>

          <div class="mb-3">
            <input type="submit" name="regist" id="regist" class="btn btn-primary">
          </div>
      </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>