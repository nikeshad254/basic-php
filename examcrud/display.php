<?php 
session_start();

if($_SESSION['loggedIn'] != "yes"){
    header("location:login.php");
    exit();
}

if(isset($_POST['logout'])){
    session_destroy();
    header("location:login.php");
}

include_once "connect.php";

$sql = "select * from data";

$res = mysqli_query($conn, $sql);

if($res){
    
?>  
    <form method="post">
        <input type="submit" name="logout" value="Log Out">
    </form>
    <table border>
        <thead>
            <th>id</th>
            <th>name</th>
            <th>address</th>
            <th>skills</th>
        </thead>
        <tbody>
            <?php while($users = mysqli_fetch_assoc($res)){ ?>
            <tr>
                <td><?php echo $users["id"];?></td>
                <td><?php echo $users["name"];?></td>
                <td><?php echo $users["address"];?></td>
                <td><?php echo $users["skill"];?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>


<?php

}else{
    echo "error";
    exit();
}

?>