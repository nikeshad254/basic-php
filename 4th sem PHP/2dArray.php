<?php
    $articles = [
        [
            "title" => "this is first post",
            "content" => "read this article",
        ],
        [
            "title" => "this is second post",
            "content" => "another post",
        ],
        [
            "title" => "this is third post",
            "content" => "kdjsdj skdjsd ",
        ],
        [
            "title" => "latest postss",
            "content" => "read this article",
        ],
    ]
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