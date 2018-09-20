<?php
namespace Encapsulation;
require_once 'Vehicle.php';

$vehicle=new Vehicle(5,'blue');
//print_r($vehicle);
echo $vehicle->__get("numberDoors");
