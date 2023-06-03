<?php 

function redirect($path){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
        $protocol = 'https';
    }else{
        $protocol = 'http';
    }
    header("Location: $protocol://".$_SERVER['HTTP_HOST']."/basic-php/4th%20sem%20PHP/srms".$path);
    exit;
}

?>