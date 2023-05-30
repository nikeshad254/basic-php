<?php
require 'includes/database.php';
require 'includes/url.php';
require 'includes/article.php';

$conn = getDB();

if(isset($_GET['id'])){
    $article = getArticle($conn, $_GET['id']);

    if($article){
        $id = $article['id'];
        $title = $article['title'];
        $content = $article['content'];
        $published_at = $article['published_at'];
    }else{
        die("Article not Found");
    }
}else{
    die("ID not suppiled, article not found");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_at = $_POST['published_at'];

    $error = validateArticle($title, $content, $published_at);

    if (empty($error)) {

        $sql = "UPDATE article SET title=?, content=?, published_at=? WHERE id = ?";
        $stmt =  mysqli_prepare($conn, $sql);
        if ($stmt === false) {
            echo mysqli_error($conn);
        } else {
            if($published_at == ''){
                $published_at = 'NULL';
            }
            mysqli_stmt_bind_param($stmt, 'sssi', $title, $content, $published_at, $id);
            if (mysqli_stmt_execute($stmt)) {
                redirect("/article.php?id=$id");
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}
?>
<?php require './includes/header.php'; ?>

<h2>Edit Article</h2>

<?php require './includes/article-form.php' ?>

<?php require './includes/footer.php'; ?>