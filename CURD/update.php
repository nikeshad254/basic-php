<?php

    include 'connect.php';
    if(!isset($_GET['user'])){
        header('Location:display.php');        
    }

    $sql = 'select * from `information` where id = '.$_GET['user'];
    $result = mysqli_query($con, $sql);
    $user = $row = mysqli_fetch_assoc($result);

    if(!$result){
        header('Location:user.php');
    }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        $sql = "UPDATE `information` SET `name` = '$name' , `email` = '$email' , `mobile` = '$mobile' WHERE `information`.`id` = ".$_GET['user'];

        $result = mysqli_query($con, $sql);
        if($result){
            echo "updating sucess";
            header('Refresh:1, url="display.php"');
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
    <form method="post">

        <label for="name">Name: </label>
        <input type="text" name="name" value="<?php echo $user['name'];?>"><br><br>

        <label for="email">Email: </label>
        <input type="text" name="email" value="<?php echo $user['email'];?>"><br><br>

        <label for="mobile">Mobile: </label>
        <input type="text" name="mobile" id="mobile" value="<?php echo $user['mobile'];?>"><br><br>

        <input type="submit" value="submit" name="submit"><br><br>
    </form>
</body>
</html>