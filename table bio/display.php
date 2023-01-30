<?php 

    include "connect.php";
    $sql = "SELECT * FROM information";
    $exec = mysqli_query($con, $sql);
    while ($data = $exec->fetch_object()){
        $users[] = $data;
    }
    // print_r($users);
    // exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <style>
        table{
            border-spacing: 0;
            width: 80vw;
            margin: 0 auto;
        }
        table th, table td{
            border: 1px solid red;
            text-align: center;
        }
    </style>
</head>
<body>
    
    <table>
        <thead>
            <th>S.N.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Nationality</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Education</th>
        </thead>
        <tbody>
            <?php
                $i=1;
                foreach($users as $user){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->mobile; ?></td>
                <td><?php echo $user->nationality; ?></td>
                <td><?php echo $user->dob; ?></td>
                <td><?php echo $user->gender; ?></td>
                <td><?php echo $user->education; ?></td>
            </tr>
            <?php 
            $i++;
             } ?>
        </tbody>
    </table>


</body>
</html>