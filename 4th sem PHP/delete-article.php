<?php
require 'includes/database.php';
require 'includes/url.php';
require 'includes/article.php';

$conn = getDB();
if (isset($_GET['id'])) {
    $article = getArticle($conn, $_GET['id']);

    if ($article) {
        $id = $article['id'];
        $title = $article['title'];
        $content = $article['content'];
        $published_at = $article['published_at'];
    } else {
        die("Article not Found");
    }
} else {
    die("ID not suppiled, article not found");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "DELETE FROM article WHERE id=?";
    $stmt =  mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        if (mysqli_stmt_execute($stmt)) {
            redirect("/basic-php/4th%20sem%20PHP/article.php?id=$id");
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}
?>
<?php require './includes/header.php'; ?>

<h2>Delete Article</h2>

<form method="post" >
<p>Are you sure</p>
<button>Delete</button>
<a href="article.php?id=<?= $article['id'];?>">Cancle</a>
</form>

<?php require './includes/footer.php'; ?>