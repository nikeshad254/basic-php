<?php
require './includes/database.php';

$conn = getDB();
$sql = "select * from article";
$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo mysqli_error($conn);
} else {
    $articles = mysqli_fetch_all($result,  MYSQLI_ASSOC);

    // echo '<pre>';
    // print_r($articles);
}

require './includes/header.php';
?>

<a href="/basic-php/4th%20sem%20PHP/new-article.php">New Article</a>

<?php if (empty($articles)) : ?>
    <p>no articles found</p>
<?php else : ?>

    <ul>
        <?php foreach ($articles as $article) :
        ?>

            <li>
                <article>
                    <h2>
                        <a href="article.php?id=<?= $article['id']; ?>" target="_blank">
                            <?= $article['title']; ?>
                        </a>
                    </h2>
                    <p><?= $article['content'] ?></p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif;
require './includes/footer.php';
?>