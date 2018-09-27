<?php
namespace Person;
require "Person.php";
require "Child.php";

$name="Todor";
$age=22;

$child=new Child($name,$age);   //fatal err. Age for child is invalid.
echo $child;


