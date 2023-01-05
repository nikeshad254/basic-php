<?php

    $con = new mysqli("localhost", "root", "", "info");
    
    if(!$con){
        die(mysqli_error($con));
    }
    // echo "connect sucessful";


?>