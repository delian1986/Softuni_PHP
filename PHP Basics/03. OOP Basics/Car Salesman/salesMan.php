<?php

namespace Sales;
include "Car.php";

$numOfEngines = intval(fgets(STDIN));
$engines = [];
for ($i = 0; $i < $numOfEngines; $i++) {
    $args = explode(" ", trim(fgets(STDIN)));
    list($model, $power) = $args;
    $displacement = null;
    $efficiency = null;
    if (count($args) == 4) {
        $displacement = $args[2];
        $efficiency = $args[3];
    } else {
        $optimal = $args[2];
        if (is_numeric($optimal)) {
            $displacement = $optimal;
        } else {
            $efficiency = $optimal;
        }
    }
    $engine = new Engine($model, $power, $displacement, $efficiency);
    $engines[$model] = $engine;
}

$numOfCars = intval(fgets(STDIN));
$cars = [];
for ($i = 0; $i < $numOfCars; $i++) {
    $args = explode(" ", trim(fgets(STDIN)));
    $model = $args[0];
    $neededEngine = $engines[$args[1]];
    $weight = null;
    $color = null;
    if (count($args) == 4) {
        $weight = $args[2];
        $color = $args[3];
    } else if (count($args) == 3) {
        $optimal = $args[2];
        if (is_numeric($optimal)) {
            $weight = $optimal;
        } else {
            $color = $optimal;
        }
    }

    $car = new Car($model, $neededEngine, $weight, $color);
    $cars[$model] = $car;
}

foreach ($cars as $car) {
    echo $car;
}

