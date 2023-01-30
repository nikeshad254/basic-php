<?php
session_start();
require_once 'db.php';

$sql = "SELECT * FROM users";
$exec = $con->query($sql);
while ($data = $exec->fetch_object()){
  $users[] = $data;
}
$states = [
  'ktm' => 'kathmandhu',
  'pkhra' => 'pokhara',
  'btwal' => 'butwal',
];
if(!isset($_SESSION['user_data'])){
  header('Location:index.php');
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

    <title>Display page!!!</title>
  </head>
  <body>
  <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand">Learn-Vern</a>
        <form class="d-flex">
          <?php 
            if(isset($_SESSION['user_data'])){
              echo '<a href="login.php">
              <button class="btn btn-outline-success" type="submit"><a href="registration.php">logout</a></button>
            </a>';
            }else{
              echo'<a href="index.php">
              <button class="btn btn-outline-success" type="submit"><a href="login.php">Registration</a></button>
            </a>';
            header('Location:index.php');
            }

          ?>
          
        </form>
      </div>
    </nav>

    <h1>data fetch</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">State</th>
            <th scope="col">Profile</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            foreach($users as $user){
          ?>
          <tr>
            <th scope="row"><?php echo $i?></th>
            <td><?php echo $user->fname?></td>
            <td><?php echo $user->lname?></td>
            <td><?php echo $user->email?></td>
            <td><?php echo $user->phone?></td>
            <td><?php echo $user->address?></td>
            <td><?php echo $user->gender?></td>
            <td><?php echo isset($states[$user->state]) ? $states[$user->state]:null;?></td>
            <td>
              <img src="<?php echo 'upload/'. $user->profile;?>" alt="alt" height="80px" width="80px">  
            </td>
            <td>
              <a class="btn btn-warning" href="update.php?user=<?php echo $user->id;?>">Edit</a>
              <a class="btn btn-danger" href="display.php?user=<?php echo $user->id;?>">Delete</a>
            </td>

          </tr>
          <?php
            $i++;
            }
          ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
  </body>
</html>