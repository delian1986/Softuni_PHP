<?php
namespace Ferrari;
require "Ferrari.php";

$driverName=readline();
$driverName1=readline();
$ferrari=new Ferrari($driverName);
$ferrari1=new Ferrari($driverName1);
echo $ferrari;
echo $ferrari1;

