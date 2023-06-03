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

?>