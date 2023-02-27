<?php
session_start();
require_once 'db.php';

if(!isset($_SESSION['data'])){
    header('Location:login.php');
}

$sql = 'select * from users ';
$exec = $conn->query($sql);

for($i=0; $i<$exec->num_rows;$i++){
    $datas[] = $exec->fetch_object();
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>LearnVern | Advanced PHP Crud</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <style>
            .table th {
                text-align: center;
            } 
        </style>
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
                    <a  class="btn btn-success" href="logout.php">Logout</a>
                </div>
            </div>
        </nav>


        <div class="album py-5 bg-light" style="height:100vh;">
            <div class="row h-100 justify-content-center">
                <table class="table table-hover" style="max-width: 85rem;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fname</th>
                            <th scope="col">Lname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">State</th>
                            <th scope="col">Profile</th>
                            <th scope="col">Hobbies</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($datas as $data){

                          ?>      
                        
                        <tr>
                            <th scope="row"><?php echo $data->id ?></th>
                            <td><?php echo $data->fname ?></td>
                            <td><?php echo $data->lname ?></td>
                            <td><?php echo $data->email ?></td>
                            <td><?php echo $data->contact ?></td>
                            <td><?php echo $data->gender ?></td>
                            <td><?php echo $data->address ?></td>
                            <td><?php echo $data->state ?></td>
                            <td><?php echo $data->hobbies ?></td>
                            <td>
                                <img src="<?php 
                                echo 'upload/'.$data->profile;
                                ?>" alt="alt" height="80px" width="80px"/>
                            </td>
                            <td>
                                <a href="update.php?id=<?php 
                                    echo $data->id;
                               ?>" class="btn btn-warning" name='edit'>Edit</a>
                                <a href="delete.php?id=<?php echo $data->id ?> " class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php 
                            $i++;
                            }
                        ?>
                    </tbody>
                </table>
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