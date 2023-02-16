<?php
session_start();
if($_SESSION['loggedIn'] != "yes"){
    header("location:login.php");
}
include "connect.php";

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $skills = implode(',', $_POST['skill']);

    $sql = "insert into data (name, address, gender, skill) values ('$name','$address','$gender', '$skills')";

    $res = mysqli_query($conn, $sql);
    if($res){
        echo "Successfully Inserted";
        header('refresh:1 , url:"display.php"');
    }
}

?>
<html>
    <body>
        <form method="post">
            Name: <input name="name" type="text"/><br/><br/>
            Address: 
            <select name='address'>
                <option value="ktm">ktm</option>
                <option value="pkh">pkh</option>
            </select><br><br>
            Gender: 
            <input type="radio" name="gender"  value="Male">Male
            <input type="radio" name="gender"  value="Female">FeMale
            <br><br>

            Skills: 
            <input type="checkbox" id="drive" name="skill[]" value="drive">drive
            <input type="checkbox" id="swim" name="skill[]" value="swim">swim
            <input type="checkbox" id="play" name="skill[]" value="play">play
            <br><br>    

            <input type="submit" name="submit">
        </form>
    </body>
</html>