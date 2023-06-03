<?php

class Database{

    function getDB()
    {
        $db_host = "localhost";
        $db_user = "www_cms";
        $db_pass = "*oxGvG5lYD!WkD/R";
        $db_name = "cms";

        $dsn = 'mysqli:host='.$db_host.';dbname='.$db_name.';charset=utf8';
        return new PDO($dsn, $db_user, $db_pass);

    }
}

?>