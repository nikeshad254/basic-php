<?php

require './includes/database.php';
require './includes/article.php';

$conn = getDB();
$sql = "select * from article where id = " . $_GET['id'];
if (isset($_GET['id'])) {
$article = getArticle($conn, $_GET['id']);
} else {
    $article = null;
}

require './includes/header.php';
?>
<?php if ($article === null) : ?>
    <p>No article found</p>
<?php else :  ?>
    <article>
        <h2><?= $article['title'] ?></h2>
        <p><?= $article['content'] ?></p>
    </article>
<?php endif;
require './includes/footer.php'
?>