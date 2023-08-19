<?php
include "./includes/db.php";
$conn = getDB();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM todos where id = '$id'";
    // echo ($sql);
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "success in deleting";
    } else {
        echo "Failed";
    }
    header("Refresh:0.3; url=./");
}
