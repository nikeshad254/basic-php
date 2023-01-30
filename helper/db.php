<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "learnvern";

mysqli_report(MYSQLI_REPORT_STRICT);
try{
    $con = new mysqli($servername,$username,$password,$db);
    date_default_timezone_set('Asia/Kolkata');
    
}catch(Exception $ex){
    echo "connection failed". $ex->getMessage();
    exit;
}
?>