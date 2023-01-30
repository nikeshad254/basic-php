<?php

session_start();
require_once 'db.php';
if(isset($_POST['login'])){

  $email = mysqli_real_escape_string($con,$_POST['email']);
  $password = mysqli_real_escape_string($con,$_POST['password']);

  $sql = "SELECT *FROM users WHERE email = '$email' AND password = '$password'";
  $exec = $con->query($sql);

  if($exec->num_rows>0){
    $_SESSION['user_data'] = $exec->fetch_object();
    header("Refresh:1, url=display.php");
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

    <title>Log in</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand">Learn-Vern</a>
        <form class="d-flex">
          <a href="registration.html">
            <button class="btn btn-outline-success" type="submit"><a href="registration.php">Registration</a></button>

          </a>
        </form>
      </div>
    </nav>

    <form class="form-time" method="POST" >
      <h3>LOG IN</h3><hr>
      <fieldset>
        <?php
          if(isset($_SESSION['user_data'])){
            echo '<div class="alert alert-success" role="alert">
    Welcome, '.$_SESSION['user_data']->fname.'
  </div>';
          }elseif (isset($exec)&&$exec->num_rows<1){
            echo '<div class="alert alert-danger" role="alert">
    email or password invalid!
  </div>';
          }
        ?>
        <div class="mb-4">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="email" required="">
        </div>

       
  
        <div class="mb-4">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" required="">
        </div>
  
        <button type="submit" name="login" class="btn btn-primary">Login</button>

      </fieldset>

    </form>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>