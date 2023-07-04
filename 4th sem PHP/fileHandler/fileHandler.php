<?php

function getDB()
{
    $conn = mysqli_connect('localhost', 'root', '', 'testDB');
    if ($conn) {
        return $conn;
    } else {
        die($conn);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = getDB();

    $file = $_FILES['file'];

    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // Define allowed file extensions
    $allowedExtensions = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'jpeg', 'jpg'];

    // Check if the file extension is allowed
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo 'Invalid file format. Allowed formats are: PDF, DOC, DOCX, PPT, PPTX, JPEG, JPG.';
        exit;
    }

    // Check the file size (in bytes)
    $fileSize = $file['size'];
    $maxSize = 5 * 1024 * 1024; // 5 MB

    if ($fileSize > $maxSize) {
        echo 'File size exceeds the maximum limit of 5 MB.';
        exit;
    }

    $uploadFolder = './uploads';

    // Generate a unique filename to avoid conflicts
    $filename = uniqid() . '.' . $fileExtension;

    $sql = "insert into student (tuNum, email, image) values ('".$_POST['tuNum']."', '".$_POST['email']."', '".$filename."')";

    $result = mysqli_query($conn, $sql);
    if($result){
        if (move_uploaded_file($file['tmp_name'], $uploadFolder . $filename)) {
            // File moved successfully, perform further processing
            echo 'File uploaded and processed successfully!';
        } else {
            echo 'Failed to upload the file.';
        }

    }else{
        echo "failed";
    }

    // Move the uploaded file to the destination folder
}
