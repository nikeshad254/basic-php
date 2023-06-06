<?php


function validateArticle($name, $phone, $math, $science, $english, $social, $nepali){
    $errors = [];
    if($name == ''){
        $errors[] = "name is Required";
    }
    if($phone == '' || !preg_match('/^\d{10}$/', $phone)){
        $errors[] = "phone is invalid";
    }
    if (!preg_match('/^(?:100|\d{1,2})$/', $math) || !preg_match('/^(?:100|\d{1,2})$/', $nepali) || !preg_match('/^(?:100|\d{1,2})$/', $science) || !preg_match('/^(?:100|\d{1,2})$/', $english) || !preg_match('/^(?:100|\d{1,2})$/', $social)) {
        $errors[] = "marks must be number and between 0-100";
    }
    return $errors;

}

function passFail($math, $science, $english, $social, $nepali){
    if($math>=40 && $science>=40 && $english>=40 && $social>=40 && $nepali>=40){
        return "PASS";
    }else{
        return "FAIL";
    }
}

function getDivision($math, $science, $english, $social, $nepali){
    if(passFail($math, $science, $english, $social, $nepali) == "FAIL"){
        return "#";
    }
    else{
        $percentage = ($math + $science + $english + $social + $nepali) / (5 * 100) * 100;
        $division = $percentage >= 90 ? "DISTINCTION" : ($percentage >= 80 ? "FIRST" : ($percentage >= 60 ? "SECOND" : ($percentage >= 40 ? "THIRD" : "#")));
        return $division;
    }
}

function getGPA($math, $science, $english, $social, $nepali){
    if(passFail($math, $science, $english, $social, $nepali) == "FAIL"){
        return "#";
    }
    else{
        $percentage = ($math + $science + $english + $social + $nepali) / (5 * 100) * 100;
        return $percentage/100*4;
    }
}

function getStuData($conn, $id){
    $sql = "SELECT * FROM student WHERE id = ?";
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

function getRank($conn, $id){
    $sql = "SELECT id, name, phone, math, science, english, social, nepali, 
            (math + science + english + social + nepali) AS total_marks
            FROM student
            ORDER BY total_marks DESC";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    if($stmt === false){
        echo mysqli_error($conn);
    } else {
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            $rank = 1;
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                if($row['id'] == $id){
                    return $rank;
                }
                $rank++;
            }
        }
    }

    return -1;
}


?>