<?php 

$servername = 'localhost';
$username = 'root';
$password =  '';
$db = 'learncore';

mysqli_report(MYSQLI_REPORT_STRICT);
try{
    $conn = mysqli_connect($servername,$username,$password,$db);
}catch(Exception $ex){
    echo "connection failed". $ex->getMessage();
}
?>