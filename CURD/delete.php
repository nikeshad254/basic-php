<?php
include_once "connect.php";
if(!isset($_GET['user'])){
    header('Location:user.php');
}

$sql = 'DELETE FROM information WHERE `information` . `id` = '. $_GET["user"];
$result = mysqli_query($con, $sql);

if($result){
    echo 'data deleted for user id = '. $_GET['user'];
}else{
    echo "failed to delete";
}
header('Refresh:2, url="display.php"');


?>