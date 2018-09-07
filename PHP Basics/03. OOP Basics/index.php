<?php
include('Car.php');
//$cars = [];
//for ($i = 0; $i < 4; $i++) {
//    list($brand, $model, $year) = explode(" ", trim(fgets(STDIN)));
//
//    $car = new Car($brand, $model);
//    $car->setYear($year);
//    $cars[] = $car;
//}
//usort($cars, "sortCarProps");
//
//foreach ($cars as $car){
//    print_r($car->print());
//}

$newCar= new Car("Opel","Corsa","1.2","5","80");
print_r($newCar);

function sortCarProps($a, $b)
{
    if ($a->getBrand() == $b->getBrand()) {
        if ($a->getModel() == $b->getModel()) {
            return $a->getYear() <=> $b->getYear();
        } else {
            return $a->getModel() <=> $b->getModel();
        }
    } else {
        return $a->getBrand() <=> $b->getBrand();
    }
}


