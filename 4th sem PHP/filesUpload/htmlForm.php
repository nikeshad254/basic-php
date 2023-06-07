<body>
    <h1>PHP File Uploads</h1>
    <form method="post" enctype="multipart/form-data" action="process-form.php">
        <label for="image">Image File</label>
        <input type="file" name="image" id="image">

        <label for="file2">Another File</label>
        <input type="file" id="file2" name="file2">
        <button>Uploads</button>
    </form>
</body>