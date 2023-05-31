<?php

class Item{
    private $fname;
    private $lname;

    public function setName($fname){
        return $this->fname = $fname;
    }

    public function getName(){
        return $this->fname;
    }
}



// class Item{

//     public $name = 'HELLO';
//     public $description;

//     // function sayHello()
//     // {
//     //     echo "hello programmerss<br>";
//     // }

//     function __construct()
//     {
//         echo "constructor called<br>";
//     }
// }
