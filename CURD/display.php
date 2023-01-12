<?php

include "connect.php";

$sql = "select * from `information`";
$result = mysqli_query($con, $sql);
if(!$result){
    header('Location:user.php');
}

?>

    <html>
        <head>
            <title>New title</title>
            <style>
                table{
                    border-spacing: 0;
                    width: 80%;
                    margin: 0 auto;
                }
                table th, table td{
                    border: 1px solid red;
                    text-align: center;
                    padding: 10px 5px;
                }
                .button{
                    padding: 5px 20px;
                    letter-spacing: 3px;
                    text-decoration: none;
                    outline: none;
                    background: #fcfcfc;
                    border-radius: 10px;
                    color: #fcfcfc;
                    font-weight: bold;
                }
                .button:hover{
                    opacity: 0.8;
                }
                .button.delete{
                    background: red;
                }
                .button.edit{
                    background: blue;
                }
            </style>
        </head>
        <body>
            <a href="user.php" class="button edit">Add</a>
            <table>
                <thead>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>mobile</th>
                    <th>Buttons</th>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                           
                    ?>
                            <tr >
                                <th scope="row"><?php echo $row['id'];?></th>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['mobile'];?></td>
                                <td>
                                    <a class="button edit" href="update.php?user=<?php echo $row['id'];?>">Edit</a>
                                    <a class="button delete" href="delete.php?user=<?php echo $row['id'];?>">Delete</a>
                                </td>

                            </tr>
                    <?php     
                        }
                    
                    ?>
                </tbody>
            </table>
        </body>
</html>
