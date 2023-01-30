<?php

    include "connect.php";
    
    if(isset($_POST['submit'])){

        $insert_data = [

            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'mobile' => $_POST['mobile'],
            'address' => $_POST['address'],
            'nationality' => $_POST['nationality'],
            'dob' => $_POST['dob'],
            'gender' => $_POST['gender'],
            'education' => $_POST['education'],
        ];

        $cols = implode(',',array_keys($insert_data));
        $vals = implode("','",array_values($insert_data));
        $sql = "INSERT INTO information ($cols) VALUES ('$vals')";
        $insert = mysqli_query($con,$sql);

        if($insert){
            echo "data inserted sucessfully";
            header("Location:display.php");
        }
        else{
            echo "failed to insert";
            header("refresh:3,url:insert.php");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>
<body>
    
    <form method="post" action="insert.php">
        <label for="name">Name:</label>
        <input type="text" name="name"><br><br>

        <label for="email">Email: </label>
        <input type="text" name="email"><br><br>

        <label for="mobile">Mobile: </label>
        <input type="text" name="mobile" id="mobile"><br><br>

        <label for="address">Address: </label>
        <input type="text" name="address" id="address"><br><br>

        <label for="nationality">nationality: </label>
        <input type="text" name="nationality" id="nationality"><br><br>

        <label for="dob">dob: </label>
        <input type="date" name="dob" id="dob"><br><br>

        <p>Gender: </p>

        <label for="gender">Male</label>
        <input type="radio" name="gender" id="gender" value="Male">

        <label for="gender">Female</label>
        <input type="radio" name="gender" id="gender" value="Female"><br><br>

        <label for="education">education: </label>

        <select name="education" id="education">
            <option value="primary">Primary</option>
            <option value="SEE">SEE</option>
            <option value="+2">+2</option>
            <option value="Bachelors">Bachelors</option>
            <option value="Masters">Masters</option>
            
        </select><br><br>

        <input type="submit" value="submit" name="submit"><br><br>
    </form>
</body>
</html>