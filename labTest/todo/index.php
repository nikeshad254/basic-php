<?php
include "./includes/db.php";
$conn = getDB();

$task = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $task = $_POST['task'];
    if (strlen($task) > 0) {
        $sql = "INSERT INTO todos (task) values ('$task')";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo "Error Occured";
            exit;
        }
    }
}

$sql = "SELECT * FROM todos";
$res = mysqli_query($conn, $sql);
$todos = [];
if ($res && !is_null($res)) {
    $todos = mysqli_fetch_all($res, MYSQLI_ASSOC);
    // print_r($todos);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
</head>

<body>

    <?php include("./includes/todoBox.php"); ?>

    <ul class="display">
        <?php
        if (count($todos) < 1) {
            echo ("<span>There are no items.</span>");
            exit;
        }

        foreach ($todos as $task) :
        ?>
            <li>
                <span><?= $task['task']; ?></span>
                <a href="./edit.php?id=<?= $task['id'] ?>">✒️</a>
                <a href="./delete.php?id=<?= $task['id'] ?>">❌</a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>