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
echo "success in connection";

$sql = "select * from article";
$result = mysqli_query($conn, $sql);
if($result === false){
    echo mysqli_error($conn);
}
else{
    $articles = mysqli_fetch_assoc($result);
}
?>

<html>
    <head>
        <style>
            body{
                display: flex;
                gap: 2rem;
            }
            .box-display{
                display: flex;
                flex-direction: column;
                justify-content: center;
                border: 1px solid red;
                width: fit-content;
                height: fit-content;
                padding: 1rem;
            }
        </style>
    </head>
    <body>
        <?php
            foreach ($articles as $key => $value):  ?>       
                <div class="box-display">
                    <h4> <?= $value['title'] ?> </h4>
                    <p> <?= $value['content'] ?> </p>
                </div>
        <?php endforeach; ?>
    </body>
</html>