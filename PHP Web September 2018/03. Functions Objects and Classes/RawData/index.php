<?php
namespace RawData;
require "Car.php";
require "Engine.php";
require "Cargo.php";
require "Tire.php";

$rows=intval(readline());
$cars=[];

while ($rows-->0){
    list($model,$engSpeed,$engPower,$cargoWeight,$cargoType,$t1P,$t1A,$t2P,$t2A,$t3P,$t3A,$t4P,$t4A)
        =explode(" ",readline());
    $engine=new Engine($engSpeed,$engPower);
    $cargo=new Cargo($cargoWeight,$cargoType);
    $tire1=new Tire($t1A,$t1P);
    $tire2=new Tire($t2A,$t2P);
    $tire3=new Tire($t3A,$t3P);
    $tire4=new Tire($t4A,$t4P);
    $tires=[$tire1,$tire2,$tire3,$tire4];
    $car=new Car($model,$engine,$cargo,$tires);
    $cars[]=$car;
}
$type=readline();
if ($type==="fragile"){
    $fragiles=array_filter($cars,function (Car $c){
       return $c->getCargoType()==="fragile";
    });

    foreach ($fragiles as $car){
        if ($car->getTirePressure()=='1'){
            echo $car;
        }
    }
}else{
    $flamables=array_filter($cars,function (Car $c){
        return $c->getCargoType()==="flamable";
    });
    foreach ($flamables as $car){
        if ($car->getEnginePower()>250){
            echo $car;
        }
    }
}

