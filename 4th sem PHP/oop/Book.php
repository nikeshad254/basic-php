<?php

class Book extends Item{
    public $author;

    // can also do like this
    // public function getDescription()
    // {
    //     return $this->name .'by: '. $this->author;
    // }

    public function getDescription(){
        return parent::getDescription()." By ". $this->author;
    }

}