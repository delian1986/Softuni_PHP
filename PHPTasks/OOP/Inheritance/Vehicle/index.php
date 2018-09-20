<?php
namespace Inheritance;
include_once "Car.php";

$myCar=new Car(5,"blue","BMW","M5",2015);
$myCar->paint("dark blue");
var_dump($myCar);

