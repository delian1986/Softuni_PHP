<?php
namespace Reverse;
include_once 'DecimalNumber.php';

$num=floatval(fgets(STDIN));
$decNum=new DecimalNumber($num);
echo $decNum->reverseNumber();
