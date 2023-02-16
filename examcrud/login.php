<?php
    session_start();
    include_once "connect.php";

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $pass = $_POST['pass'];

        $sql = "select * from data where name = '$name' and id = '$pass'";
        $res = mysqli_query($conn, $sql);
        if($res){
            $row = mysqli_fetch_assoc($res);
            if(!is_null($row)){
                echo "login sucess";
                $_SESSION["loggedIn"] = "yes";
                header("location:display.php");
            }else{
                echo "id or pass invalid";
                $_SESSION["loggedIn"] = "no";
            }
        }else{
            echo "some error occured";
        }
    }
?>
<html>
    <body>
        <form action="login.php" method="post">
            Name: <input type="text" name="name">
            <br><br>
            <!-- i m going to use id as a password -->
            password: <input type="text" name="pass">
            <br><br>
            <input type="submit" name="submit">
        </form>
    </body>
</html>