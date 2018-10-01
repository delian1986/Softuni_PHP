<?php
namespace Person;
require "Citizen.php";

$name=readline();
$age=intval(readline());
$myCitizen = new Citizen($name, $age);
echo $myCitizen;

