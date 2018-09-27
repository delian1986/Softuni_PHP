<?php

namespace Pizza;
require "Dough.php";
require "Topping.php";
require "Pizza.php";

$pizza = "";
$pizzaName = "";
$numOfPizzaToppings = 0;
$toppings = [];
$totalCals = 0;
$error = false;

while (1) {
    $line = explode(" ", readline());
    if ($line[0] === "END") {
        break;
    }

    if ($line[0] === "Dough" and !$error) {
        $doughType = [$line[1], $line[2]];
        $weight = intval($line[3]);
        try {
            $dough = new Dough($doughType, $weight);
            $totalCals += floatval($dough->getCalories());

        } catch (\Exception $e) {
            $error = true;
            echo $e->getMessage();
        }
    } else if ($line[0] === "Topping" and !$error) {
        $topType = $line[1];
        $topWeight = $line[2];

        try {
            $currTopping = new Topping($topType, $topWeight);
            $toppings[] = $currTopping;
            $totalCals += floatval($currTopping->getCalories());

        } catch (\Exception $e) {
            $error = true;

            echo $e->getMessage();
        }

    } else if ($line[0] == "Pizza") {
        try {
            $pizzaName = $line[1];
            $numOfPizzaToppings = $line[2];
            $pizza = new Pizza($pizzaName, $numOfPizzaToppings);
        } catch (\Exception $e) {
            $error = true;

            echo $e->getMessage();
        }
    }
}

if (!$error) {
    $pizza->setTotalCals($totalCals);
    echo $pizza;
}
