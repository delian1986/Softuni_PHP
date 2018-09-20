<?php

namespace Speed;
include "Car.php";

$lines = intval(fgets(STDIN));
$allCars=[];
for ($i = 0; $i < $lines; $i++) {
    list($model,$fuelAmount,$distance)=explode(" ",trim(fgets(STDIN)));
    $car=new Car($model,$fuelAmount,$distance);
    $allCars[$car->getModel()]=$car;
}

while (1){
    $line=trim(fgets(STDIN));
    if ($line=="End"){
        break;
    }
    list($action,$model,$distance)=explode(" ",$line);
    $allCars[$model]->drive($distance);
}

foreach ($allCars as $model => $car) {
    echo $car;
}


