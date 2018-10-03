<?php
namespace iPerson;
require "Citizen.php";

$name=readline();
$age=intval(readline());
$id=intval(readline());
$bDate=readline();

$myCitizen = new Citizen($name, $age,$id,$bDate);
echo $myCitizen;

