<?php 

date_default_timezone_set("Asia/Kolkata");
session_start();
require_once 'models/model.php';


class Controller extends Model{

    function __construct()
    {   
        // :: le object banna agadi value access garxa !!
        parent:: __construct();
        
        if(isset($_SERVER['PATH_INFO'])){

            switch ($_SERVER['PATH_INFO']){

                case '/index':
   

                break;
                
                case '/register':
                    if(isset($_POST['regist'])){

                        $path = 'uploads/';
                        $extension = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
                        $filename = $_POST['fname'].'_'.date('YmdHis'). '.'. $extension;
                    
                        $profile = (file_exists($_FILES['profile']['tmp_name'])) ? $filename : null ;
                    
                        $insert_data = [
                    
                    //      'db col name' => $_POST[' form's input's name '],
                    
                            'fname' => $_POST['fname'],
                            'lname' => $_POST['lname'],
                            'email' => $_POST['email'],
                            'pass' =>  password_hash($_POST['password'],PASSWORD_DEFAULT) ,
                            'contact' => $_POST['mobile'],
                            'gender' => $_POST['gender'],
                            'address' => $_POST['address'],
                            'state' => $_POST['state'],
                            'profile' => $profile,
                            'hobbies' => implode(",",$_POST['hobbies'])
                        ];

                        $insertEx = $this->insert_data('users',$insert_data);
                        
                        if($insertEx['code']){
                            if(!is_null($profile)){
                                move_uploaded_file($_FILES['profile']['tmp_name'],$path.$filename);
                            }
                            ?>
                            <script>
                                alert("<?php echo $insertEx['message']; ?>");
                                window.location.href = 'login';
                            </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                alert("<?php echo $insertEx['message']; ?>");
                                window.location.href = 'register';
                            </script>
                            <?php
                        }

                        exit;

                    }
                    include 'view/header.php';
                    include 'view/register.php';
                    include 'view/footer.php';

                break;

                case '/login':

                    // session xa vane login ko page na auna ko lagi re check role id.
                    if(isset($_SESSION['user']) && $_SESSION['user']->role_id == 1){
                        ?>
                    <script>
                        window.location.href = 'adminpage';
                    </script>
                    <?php
                    }
                    else if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 0){
                        ?>
                    <script>
                        window.location.href = 'userpage';
                    </script>
                    <?php
                    }


                    if(isset($_POST['login'])){
                        $email = mysqli_real_escape_string($this->conn,$_POST['email']);
                        $pass = mysqli_real_escape_string($this->conn,$_POST['pass']);
                        
                        $loginEx = $this->login($email,$pass);
                        if ($loginEx['code']){
                            $_SESSION['user'] = $loginEx['data'];
                            if($_SESSION['user']->role_id == 1){
                                ?>
                            <script>
                                alert("<?php echo $loginEx['message']; ?>");
                                window.location.href = 'adminpage';
                            </script>
                            <?php
                            }
                            else{
                                ?>
                            <script>
                                alert("<?php echo $loginEx['message']; ?>");
                                window.location.href = 'userpage';
                            </script>
                            <?php
                            }

                        }
                        else{
                            ?>
                            <script>
                                alert("<?php echo $loginEx['message']; ?>");
                                window.location.href = 'login';
                            </script>
                            <?php
                        }

                    }


                    include 'view/header.php';
                    include 'view/login.php';
                    include 'view/footer.php';
                
                break;

                case '/userpage':
                    if(!isset($_SESSION['user']) || $_SESSION['user']->role_id != 0){
                        ?>
                    <script>
                        window.location.href = 'login';
                    </script>
                    <?php
                    }
                    $where = ['id' => $_SESSION['user']->id];
                    $selectEx = $this->selectdata('users', $where);

                    include 'view/header.php';
                    include 'view/userpage.php';
                    include 'view/footer.php';
                    
                break;

                case '/adminpage':
                    if(!isset($_SESSION['user']) || $_SESSION['user']->role_id != 1){
                        ?>
                    <script>
                        window.location.href = 'login';
                    </script>
                    <?php
                    }
                    $selectEx = $this->selectdata('users', $where = []);

                    if(isset($_GET['user'])){
                        $where = ['id' => $_GET['user']];
                        $deleteEx = $this->delete_data('users',$where);
                        if($deleteEx){
                            ?>
                            <script>
                                alert("<?php echo 'data delete sucessfully! '; ?>");
                                window.location.href = 'adminpage';
                            </script>
                            <?php
                        }else{
                            ?>
                            <script>
                                alert("<?php echo 'data delete failed! '; ?>");
                                window.location.href = 'adminpage';
                            </script>
                            <?php
                        }
 
                    }
                    include 'view/header.php';
                    include 'view/adminpage.php';
                    include 'view/footer.php';
                break;
                
                case '/logout':
                    unset($_SESSION['user']);
                    session_destroy();

                    ?>
                    <script>
                        alert(" User logout sucessfully !!");
                        window.location.href = 'login';
                    </script>
                    <?php

                break;

                case '/update':

                    $where = ['id' => $_GET['user']];
                    $selectEx = $this->selectdata('users', $where);
                    $user = $selectEx['data'][0];

                    if(isset($_POST['Update'])){

                        $path = 'uploads/';
                        $extension = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
                        $filename = $_POST['fname'].'_'.date('YmdHis'). '.'. $extension;
                    
                        $profile = (file_exists($_FILES['profile']['tmp_name'])) ? $filename : $user->profile ;
                    
                        $update_data = [
                    
                    //      'db col name' => $_POST[' form's input's name '],
                    
                            'fname' => mysqli_real_escape_string($this->conn,  $_POST['fname']),
                            'lname' => mysqli_real_escape_string($this->conn,  $_POST['lname']),
                            'email' => mysqli_real_escape_string($this->conn,  $_POST['email']),
                            'pass' => mysqli_real_escape_string($this->conn,  $_POST['password']),
                            'contact' => mysqli_real_escape_string($this->conn,  $_POST['mobile']),
                            'gender' => mysqli_real_escape_string($this->conn,  $_POST['gender']),
                            'address' => mysqli_real_escape_string($this->conn,  $_POST['address']),
                            'state' => mysqli_real_escape_string($this->conn,  $_POST['state']),
                            'profile' => mysqli_real_escape_string($this->conn,  $profile),
                            'hobbies' => mysqli_real_escape_string($this->conn, implode(",", $_POST['hobbies']))
                        ];
                        
                        $updateEx = $this->updatedata('users',$update_data,$where);
                        if($updateEx){
                            if(!is_null($profile)){
                                move_uploaded_file($_FILES['profile']['tmp_name'],$path.$filename);
                            }
                            ?>
                            <script>
                                alert("<?php echo 'data updated sucessfully! '; ?>");
                                window.location.href = 'adminpage';
                            </script>
                            <?php
                            
                        }else{
                            ?>
                            <script>
                                alert("<?php echo 'data updated failed miserably! '; ?>");
                                window.location.href = 'adminpage';
                            </script>
                            <?php
                        }
                    }
                    
                    include 'view/header.php';
                    include 'view/update.php';
                    include 'view/footer.php';
                break;

                default:

            }
        }

    }
}

$obj = new Controller;




?>