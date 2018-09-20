<?php

namespace RawData;
include "Car.php";

$amountOfCars = intval(fgets(STDIN));
$fragileCars = [];
$flamableCars = [];
for ($i = 0; $i < $amountOfCars; $i++) {
    list($model, $engineSpeed, $enginePower, $cargoWeight, $cargoType, $t1P, $t1A, $t2P, $t2A, $t3P, $t3A, $t4P, $t4A)
        = explode(" ", trim(fgets(STDIN)));
    $tire1=new Tires($t1P,$t1A);
    $tire2=new Tires($t2P,$t2A);
    $tire3=new Tires($t3P,$t3A);
    $tire4=new Tires($t4P,$t4A);

    $car = new Car($model, $engineSpeed, $enginePower, $cargoWeight, $cargoType, $tire1,$tire2,$tire3,$tire4);
    if ($cargoType == "fragile") {
        $fragileCars[] = $car;
    } else {
        $flamableCars[] = $car;
    }
}
$needle = trim(fgets(STDIN));
$resultArr = [];
if ($needle == "fragile") {
    $resultArr = array_filter($fragileCars, function ($car) {
            foreach ($car->getTires() as $tire){
                if ($tire->getPressure()<1){
                    return true;
                }
        }
    });

} else {
    $resultArr = array_filter($flamableCars, function ($car) {
        if ($car->getEngine()->getEnginePower() > 250) {
            return true;
        }
    });

}
    foreach ($resultArr as $car) {
        echo $car;
    }


