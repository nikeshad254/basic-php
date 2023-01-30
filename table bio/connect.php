<?php

    $con = new mysqli("localhost", "root", "", "info");
    
    if(!$con){
        echo "db connect failed";
        die(mysqli_error($con));
    }
    // echo "connect sucessful";


?>