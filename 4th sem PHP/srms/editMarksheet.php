<?php
require 'includes/database.php';
require 'includes/url.php';
require 'includes/formHandler.php';

$conn = getDB();

if(isset($_GET['id'])){
    $marksheet = getStuData($conn, $_GET['id']);

    if($marksheet){
        $id = $marksheet['id'];
        $name = $marksheet['name'];
        $phone = $marksheet['phone'];
        $math = $marksheet['math'];
        $science = $marksheet['science'];
        $english = $marksheet['english'];
        $social = $marksheet['social'];
        $social = $marksheet['social'];
        $nepali = $marksheet['nepali'];
    }else{
        die("Student not Found");
    }
}else{
    die("ID not suppiled, Student not found");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $math = $_POST['math'];
    $science = $_POST['science'];
    $english = $_POST['english'];
    $social = $_POST['social'];
    $nepali = $_POST['nepali'];

    $error = validateArticle($name, $phone, $math, $science, $english, $social, $nepali);

    if (empty($error)) {

        $sql = "UPDATE student SET name=?, phone=?, math=?, science=?, english=?, social=?, nepali=? WHERE id = ?";
        $stmt =  mysqli_prepare($conn, $sql);
        if ($stmt === false) {
            echo mysqli_error($conn);
        } else {
            mysqli_stmt_bind_param($stmt, 'ssiiiiii', $name, $phone, $math, $science, $english, $social, $nepali, $id);
            if (mysqli_stmt_execute($stmt)) {
                redirect("./stuMarksheet.php?id=$id");
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}

?>

<?php require './includes/header.php'; ?>

<h2>Edit Sheet</h2>

<?php require './includes/studentForm.php' ?>

<?php require './includes/footer.php'; ?>