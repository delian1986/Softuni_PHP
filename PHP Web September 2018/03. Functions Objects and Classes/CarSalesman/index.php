<?php

namespace CarSalesman;
require "Car.php";
require "Engine.php";

$engines = [];
$cars = [];

$engineRows = intval(readline());
while ($engineRows-- > 0) {
    $engineParts = explode(" ", trim(readline()));
    $model = $engineParts[0];
    $power = $engineParts[1];
    $displacement = null;
    $efficiency = null;
    $engine = new Engine($model, $power, $displacement, $efficiency);

    if (count($engineParts) == 3) {
        if (ctype_digit($engineParts[2])) {
            $displacement = $engineParts[2];
        } else {
            $efficiency = $engineParts[2];
        }
    } else if (count($engineParts) == 4) {
        $displacement = $engineParts[2];
        $efficiency = $engineParts[3];
    }
    $engine->setDisplacement($displacement);
    $engine->setEfficiency($efficiency);
    $engines[$model] = $engine;
}

$rowOfCars = readline();
while ($rowOfCars-- > 0) {
    $carArgs = explode(" ", trim(readline()));
    $carModel = $carArgs[0];
    $engModel = $carArgs[1];
    $weight = null;
    $color = null;
    $engine = $engines[$engModel];
    $car = new Car($carModel, $engine);
    if (count($carArgs) == 3) {
        if (ctype_digit($carArgs[2])) {
            $weight = $carArgs[2];
        } else {
            $color = $carArgs[2];
        }
    } else if (count($carArgs) == 4) {
        $weight = $carArgs[2];
        $color = $carArgs[3];
    }
    $car->setColor($color);
    $car->setWeight($weight);
    $cars[] = $car;
}

foreach ($cars as $car) {
    echo $car;
}
