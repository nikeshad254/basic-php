<?php
require './includes/database.php';
require './includes/url.php';
require './includes/formHandler.php';

$error = [];
$name = '';
$phone = '';
$math = '';
$science = '';
$english = '';
$social = '';
$nepali = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $math = $_POST['math'];
    $science = $_POST['science'];
    $english = $_POST['english'];
    $social = $_POST['social'];
    $nepali = $_POST['nepali'];

    $error = validateArticle($name, $phone, $math, $science, $english, $social, $nepali);

    if (empty($error)) {
        $conn = getDB();
        $sql = "INSERT INTO student (name, phone, math, science, english, social, nepali) VALUES (?,?,?,?,?,?,?)";
        $stmt =  mysqli_prepare($conn, $sql);
        if ($stmt === false) {
            echo mysqli_error($conn);
        } else {
            mysqli_stmt_bind_param($stmt, 'ssiiiii', $name, $phone, $math, $science, $english, $social, $nepali);
            if (mysqli_stmt_execute($stmt)) {
                $id = mysqli_insert_id($conn);

                redirect("/index.php");
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}
?>


<?php
require './includes/header.php';
require './includes/studentForm.php';
require './includes/footer.php';
?>


