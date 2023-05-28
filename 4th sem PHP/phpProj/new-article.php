<?php
require 'includes/database.php';
require 'includes/url.php';
require 'includes/article.php';
require 'includes/auth.php';
session_start();

if(!isLoggedIn()){
    die("unauthorized");
}

$error = [];
$title = '';
$content = '';
$published_at = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_at = $_POST['published_at'];

    $error = validateArticle($title, $content, $published_at);

    if (empty($error)) {
        $conn = getDB();
        $sql = "INSERT INTO article (title, content, published_at) VALUES (?,?,?)";
        $stmt =  mysqli_prepare($conn, $sql);
        if ($stmt === false) {
            echo mysqli_error($conn);
        } else {
            mysqli_stmt_bind_param($stmt, 'sss', $title, $content, $published_at);
            if (mysqli_stmt_execute($stmt)) {
                $id = mysqli_insert_id($conn);
                
                redirect("/basic-php/4th%20sem%20PHP/article.php?id=$id");
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}
?>
<?php require './includes/header.php'; ?>

<h2>New Article with binding</h2>

<?php require './includes/article-form.php' ?>

<?php require './includes/footer.php'; ?>