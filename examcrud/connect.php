<?php 

$conn = mysqli_connect("localhost", "root", "", "test");
if(!$conn){
    echo "error occured";
    die($conn);
    exit();
}
// echo"connection sucess";


?>