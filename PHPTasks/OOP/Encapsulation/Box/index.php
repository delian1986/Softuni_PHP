<?php
namespace Box;
include_once 'Box.php';

$length=readline();
$wight=readline();
$height=readline();

$box=new Box($length,$wight,$height);
echo $box;

