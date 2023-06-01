<?php
require './Item.php';
require './Book.php';

$first_obj = new Item();
$first_obj->name = "TV";

echo $first_obj->getDescription();

echo "<br>";

$book = new Book();
$book -> name = "web dev";
$book -> author = " raja ram";

echo $book->getDescription();
echo $book->author;

?>