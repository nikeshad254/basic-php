<?php
include "./includes/db.php";
$conn = getDB();

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $task = $_POST['task'];

    if (strlen($task) > 0) {
        $sql = "UPDATE todos SET task = '$task' WHERE id = $id";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "Changed Todo...";
        } else {
            echo "failed...";
        }
        header("Refresh:0.3; url=./");
    }
}

$sql = "SELECT * FROM todos where id = " . $_GET['id'];
$res = mysqli_query($conn, $sql);
$item = [];
$task = "";
if ($res) {
    $item = mysqli_fetch_assoc($res);
    $task = $item['task'];
} else {
    echo "failed...";
    header("Refresh:0.3; url=./");
}


include "./includes/todoBox.php";
