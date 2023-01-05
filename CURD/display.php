<?php

include "connect.php";

$sql = "select * from `information`";
$result = mysqli_query($con, $sql);
if($result){
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
                button{
                    padding: 10px 20px;
                    letter-spacing: 3px;
                    outline: none;
                    background: #fcfcfc;
                    border-radius: 10px;
                    color: #fcfcfc;
                    font-weight: bold;
                }
                button:hover{
                    opacity: 0.8;
                }
                button.delete{
                    background: red;
                }
                button.edit{
                    background: blue;
                }
            </style>
        </head>
        <body>
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
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $mobile = $row['mobile'];

                            echo '<tr >
                                <th scope="row">'.$id.'</th>
                                <td>'.$name.'</td>
                                <td>'.$email.'</td>
                                <td>'.$mobile.'</td>
                                <td>
                                    <button class="delete">Delete</button>
                                    <button class="edit">Edit</button>
                                </td>

                            </tr>';
                            
                        }
                    
                    ?>
                </tbody>
            </table>
        </body>
    </html>





    <?php
}

?>