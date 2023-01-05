<?php

    include 'connect.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        $sql = "insert into `information` (name, email, mobile) values ('$name', '$email', '$mobile')";

        $result = mysqli_query($con, $sql);
        if($result){
            echo "data inserted sucessfully";
        }
        else{
            die(mysqli_error($con));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding to data base</title>
</head>
<body>
    <form action="user.php" method="post">

        <label for="name">Name: </label>
        <input type="text" name="name"><br><br>

        <label for="email">Email: </label>
        <input type="text" name="email"><br><br>

        <label for="mobile">Mobile: </label>
        <input type="text" name="mobile" id="mobile"><br><br>

        <input type="submit" value="submit" name="submit"><br><br>
    </form>
</body>
</html>