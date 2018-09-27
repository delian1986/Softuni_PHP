<?php
namespace PrintPeople;

$people=[];

while (1) {
    $line = readline();
    if ($line == "END"){break;}
    list($name, $age, $occupation) = explode(" ", $line);
    $person = new Person($name, $age, $occupation);
    $people[]=$person;
}

usort($people,function ($a,$b){
   return $a->age <=> $b->age;
});

foreach ($people as $person){
    echo $person;
}