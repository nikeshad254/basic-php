<?php

require 'includes/url.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_POST['username'] == 'deepak' && $_POST['password'] == 'deepak'){
        session_regenerate_id(true);    //new id everytime login so safe from exploit
        $_SESSION['is_logged_in'] = true;
        redirect('/dbFectching.php');
    }else{
        $error = "login incorrect";
    }
}

require "includes/header.php";
?>
<h2>Login</h2>
<?php if(!empty($error)) :?>
    <p><?= $error ?></p>
<?php endif; ?>

<form method="post">
    <div>
        <label for="username">username</label>
        <input type="text" name="username" id="username">
    </div>

    <div>
        <label for="password">password</label>
        <input type="password" name="password" id="password">
    </div>

    <button>Log in</button>
</form>
<?php require 'includes/footer.php'; ?>