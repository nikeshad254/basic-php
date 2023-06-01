<?php
require './includes/database.php';
require './includes/auth.php';
session_start();

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

<?php if(isLoggedIn()):  ?>
    <p>you are logged in. <a href="./logout.php">Log out</a> </p>
    <a href="./new-article.php">New Article</a>
<?php else:  ?>
    <p>you are not logged in. <a href="./login.php">Log in</a></p>
<?php endif; ?>


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