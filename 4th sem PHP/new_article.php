<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require './includes/database.php';
    $sql = "INSERT INTO article(title, content, published_at) VALUES('".$_POST['title']."', '".$_POST['content']."','".$_POST['published_at']."')";
    
    $result = mysqli_query($conn, $sql);
    if($result==false){
        echo mysqli_error($conn);
    }
    else{
        $id = mysqli_insert_id($conn);
        echo "inserted record with id: $id";
    }
}

require './includes/header.php';
?>
<h2>New Article</h2>
<form method="post">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Article Title Here...">
    </div>

    <div>
        <label for="content">Content</label>
        <textarea type="text" name="content" id="content" placeholder="content here..." cols='40' row='4'></textarea>
    </div>

    <div>
        <label for="published_at">Published At</label>
        <input type="datetime-local" name="published_at" id="published_at">
    </div>
    <button>Add</button>
</form>
<?php require './includes/footer.php'; ?>