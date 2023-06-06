<?php

class Database{

    function getConn()
    {
        $db_host = "localhost";
        $db_user = "www_cms";
        $db_pass = "*oxGvG5lYD!WkD/R";
        $db_name = "cms";

        $dsn = 'mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8';
        return new PDO($dsn, $db_user, $db_pass);

    }
}

?>