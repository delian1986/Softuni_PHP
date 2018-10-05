<?php
//50/100

namespace Vehicles;
require "Vehicle.php";
require "Car.php";
require "Truck.php";

list($vehicle,$carFuelQuantity,$carFuelConsum)=explode(" ",readline());
list($vehicle,$truckFuelQuantity,$truckFuelConsum)=explode(" ",readline());

$car=new Car($carFuelQuantity,$carFuelConsum);
$truck=new Truck($truckFuelQuantity,$truckFuelConsum);

$lines=intval(readline());
while ($lines-->0){
    list($action,$vehicle,$quantity)=explode(" ",readline());

    if ($action=="Drive"){
        switch ($vehicle) {
            case "Car":
                $car->Drive($quantity);
                break;
            case "Truck":
                $truck->Drive($quantity);
                break;
        }
    }else{
        switch ($vehicle) {
            case "Car":
                $car->Refuel($quantity);
                break;
            case "Truck":
                $truck->Refuel($quantity);
                break;
        }
    }
}
echo $car;
echo $truck;


