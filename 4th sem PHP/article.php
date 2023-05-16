<?php

$db_host = "localhost";
$db_user = "www_cms";
$db_pass = "*oxGvG5lYD!WkD/R";
$db_name = "cms";
$articles;
$conn =  mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()){
    echo mysqli_connect_error();
    exit;
}

if(is_numeric($_GET['id'])){
    $sql = "select * from article where id = ".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo mysqli_error($conn);
    }
    else{
        $articles = mysqli_fetch_assoc($result);
        // var_dump($articles);
    }
}
else{
    $articles = null;
}

?>
<body>
    <header>
        <h1>My Blog</h1>
    </header>

    <main>
        <?php if($articles === null ): ?>
        <p>No articles found</p>
        <?php else:  ?>
        <article>
            <h2><?= $articles['title'] ?></h2>
            <p><?= $articles['context'] ?></p>
        </article>
        <?php endif; ?>
    </main>
</body>