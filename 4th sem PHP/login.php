<?php

require 'includes/url.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_POST['username'] == 'deepak' && $_POST['password'] == 'deepak'){
        session_regenerate_id(true);    //new id everytime login so safe from exploit
        $_SESSION['is_logged_in'] = true;
        redirect('/');
    }else{
        $error = "login incorrect";
    }
}

require "includes/header.php";
?>
<h2>Login</h2>
