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

?>