<?php
namespace BoxValidation;
use MongoDB\Driver\Exception\Exception;

include_once 'Box.php';

$length=readline();
$wight=readline();
$height=readline();

try{
    $box=new Box($length,$wight,$height);
    echo $box;
}catch (\Exception $e) {
    echo $e->getMessage();
}


