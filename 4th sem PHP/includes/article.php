<?php 
/** 
 * get the article record based on the ID
 * @param object $conn connection to the database 
 * @integer $id article ID
 * @return mixed An associative containting the article with that id or null if not found.
*/
function getArticle($conn, $id){
    $sql = "SELECT * FROM article WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt===false){
        echo mysqli_error($conn);
    }else{
        mysqli_stmt_bind_param($stmt, "i", $id);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }
}

?>