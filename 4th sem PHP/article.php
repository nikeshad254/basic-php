<?php

require './includes/database.php';

if (is_numeric($_GET['id'])) {
    $sql = "select * from article where id = " . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    if ($result === false) {
        echo mysqli_error($conn);
    } else {
        $articles = mysqli_fetch_assoc($result);
        // var_dump($articles);
    }
} else {
    $articles = null;
}

require './includes/header.php';
?>
<?php if ($articles === null) : ?>
    <p>No articles found</p>
<?php else :  ?>
    <article>
        <h2><?= $articles['title'] ?></h2>
        <p><?= $articles['context'] ?></p>
    </article>
<?php endif;
require './includes/footer.php'
?>