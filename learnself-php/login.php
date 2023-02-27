<?php 

require_once 'db.php';
session_start();

if(isset($_POST['login'])){
    
    $mail = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,$_POST['pass']);

    $sql = "select * from users where email = '$mail' and pass = '$pass'";
    $exec = $conn->query($sql);

    if($exec->num_rows > 0){
        //sucess in log in 

        $_SESSION['data'] = $exec->fetch_object();      //data session has all data now


    }
}




?>


<!DOCTYPE html>
<html>
    <head>
        <title>LearnVern | Advanced PHP Crud</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#">LearnVern</a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <!--                    <a  class="btn btn-success" href="login.html">Login</a>-->
                    <a  class="btn btn-success" href="registration.php">Registration</a>
                </div>
            </div>
        </nav>


        <div class="album py-5 bg-light" style="height:100vh;">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="card border-success" style="max-width: 30rem;padding: 2%;">
                    <h2> Login </h2> <hr>
                    <div class="card-body">
                        <form method="post">
                            <?php
                            if(isset($_POST['login'])){
                                if(isset($_SESSION['data'] ) && $exec->num_rows > 0){
                                    echo ' <div class="alert alert-success" role="alert">
                                            Login Sucess, welcome '.$_SESSION['data']->fname.'
                                        </div>';
                                    header("Refresh:1;url=index.php");
                                }
                                else if ($exec->num_rows < 1){
                                    echo ' <div class="alert alert-danger" role="alert">
                                            Login failed email or password invalid!!
                                        </div>';
                                }
                            }
                            ?>
                            <div class="mb-3">
                                <label for="login_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="login_email" name="email" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="login_password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="login_password" name="pass" placeholder="password">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="login" id="login" value="Login" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer bg-dark" style="padding-top: 20px;">
            <div class="container">
                <span class="text-muted">Made by Meet Shah - <a href="https://www.learnvern.com/"> LearnVern </a> using <a href="https://getbootstrap.com/">Bootstrap</a>.</span>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    </body>
</html>