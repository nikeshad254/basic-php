<?php

$db_host = "localhost";
$db_user = "www_cms";
$db_pass = "*oxGvG5lYD!WkD/R";
$db_name = "cms";
$articles = [];
$conn =  mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

?>