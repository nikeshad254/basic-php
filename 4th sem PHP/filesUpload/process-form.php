<?php 

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit("POST REQUEST METHOD REQUIRED");
}

if(empty($_FILES)){
    exit("$_FILES is empty, is file_uploads enabled in php.ini");
}
if($_FILES['image']['error']!==UPLOAD_ERR_OK){

    switch($_FILES['image']['error']){
    case UPLOAD_ERR_PARTIAL:
        exit("file only partially uploaded");
        break;
    case UPLOAD_ERR_NO_FILE:
        exit("no file was uploaded");
        break;
    case UPLOAD_ERR_EXTENSION:
        exit("file upload stopped by a php extension");
        break;
    default:
        exit("unknown upload error");
        break;
    }
}
if($_FILES['image']['size']>1048576){
    exit("file too large(max 1MB)");
}
