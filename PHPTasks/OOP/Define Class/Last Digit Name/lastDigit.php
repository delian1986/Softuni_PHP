<?php
namespace LastNumber;
include_once 'Number.php';

$num=intval(trim(fgets(STDIN)));
$number=new Number($num);
echo $number->sayLastNumber();

