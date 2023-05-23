<?php
require 'includes/database.php';
require 'includes/article.php';
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
                
                if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
                    $protocol = 'https';
                }else{
                    $protocol = 'http';
                }
                header("Location: $protocol://".$_SERVER['HTTP_HOST']."/basic-php/4th%20sem%20PHP/article.php?id=$id");
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}
?>
<?php require './includes/header.php'; ?>

<h2>New Article with binding</h2>
<?php if (!empty($error)) : ?>
    <ul>
        <?php foreach ($error as $err) : ?>
            <li><?= $err ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="title here... " value="<?= htmlspecialchars($title); ?>">
    </div>
    
    <div>
        <label for="content">Content</label>
        <textarea type="text" name="content" id="content" placeholder="content here..." cols='40' row='4'><?= htmlspecialchars($content); ?></textarea>
    </div>

    <div>
        <label for="published_at" value="<?= htmlspecialchars($published_at); ?>">Published At</label>
        <input type="datetime" name="published_at" id="published_at">
    </div>
    <button>Add</button>
</form>

<?php require './includes/footer.php'; ?>