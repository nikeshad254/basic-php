<?php

function getDB()
{
    $conn = mysqli_connect("localhost", "root", "", "todo");
    if (!$conn) {
        die(mysqli_connect_error());
        exit;
    }
    return $conn;
}
