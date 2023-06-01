<?php

class Item{

    public $name;
    
    public function getDescription(){
        return "Item: " . $this->name;
    }
}