<?php
namespace Mordor;

include_once "Mage.php";

$allFood=explode(",",readline());
$gandalf=new Mage();

foreach ($allFood as $food){
    $gandalf->eat($food);
}

echo $gandalf;

