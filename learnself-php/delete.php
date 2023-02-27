<?php
session_start();
require_once 'db.php';

if(!isset($_SESSION['data'])){
    header('Location:login.php');
}
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    //select * fromm TABLE where id = ID
    $sql = "select * from users where id = $id";
    $exe = $conn->query($sql);

    if($exe->num_rows>0){
        $data = $exe->fetch_object();
    }else{
        echo "sth went wrong!!";
        header('Refresh:1;url=index.php');
    }
    //file location
    $file_pointer = "upload/".$data->profile;
    if (!unlink($file_pointer)) {
        echo ("some problem occured");
    }
    else {
        $sql = "delete from users where id = $id";
        $exe = $conn->query($sql);
        echo "data has been deleted";

        if($_SESSION['data']->id == $id){
            echo '<br> your own data was deleted';
            header('Refresh:1;url=logout.php');
        }else{
            header('Refresh:1;url=index.php');
        }
    }
    // delete from TABLE where id = ID 

}


?>