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
    <button>Save</button>
</form>