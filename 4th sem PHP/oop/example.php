<?php
require './Item.php';

// static access garna lai, class name and clos :: needed
var_dump(Item::$count);
$first_obj = new Item('raju ', 'balaju');
var_dump(Item::$count);
echo $first_obj->name;

$second_obj = new Item('hari ', 'jamal');
var_dump(Item::$count);
echo $second_obj->name;
Item::showCount();

?>