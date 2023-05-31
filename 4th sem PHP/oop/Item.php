<?php

class Item{
    public $name;
    public $address;
    public static $count=0;
    public function __construct($name, $address)
    {
        $this->name = $name;
        $this->address=$address;
        static::$count++;
    }
    public static function showCount(){
        echo static::$count;
    }
}