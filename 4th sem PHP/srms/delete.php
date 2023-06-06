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

    $sql = "DELETE FROM student WHERE id=?";
    $stmt =  mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        if (mysqli_stmt_execute($stmt)) {
            redirect("/index.php");
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}
?>
<?php require './includes/header.php'; ?>

<h2>Delete Student Record</h2>

<form method="post" >
<p>Are you sure</p>
<button class="btn">Delete</button>
<a class="btn" href="./stuMarksheet.php?id=<?= $marksheet['id'];?>" style="text-align:center">Cancel</a>
</form>

<?php require './includes/footer.php'; ?>