<?php
//60/100

namespace Speed;
require "Car.php";

class App
{
    private $cars = [];

    public function Start()
    {
        $this->ProceedInput();
    }

    private function ProceedInput()
    {
        $lines = readline();
        $this->AddCars($lines);
        $this->DriveCars();
        $this->proceedOutput();
    }

    private function proceedOutput(){
        foreach ($this->cars as $model=>$car){
            echo $car[0];
        }
    }

    private function DriveCars()
    {
        while (1){
            $input=readline();
            if ($input=="End"){break;}
            list($drive,$model,$distance)=explode(" ",$input);
            $currCar=$this->getCurrentCar($model);
            try{
            $currCar->Drive($distance);
            }catch (\Exception $e){
                echo $e->getMessage();
            }

        }
    }

    private function getCurrentCar($model):Car{
        return $this->cars[$model][0];
    }

    private function AddCars($lines)
    {
        while ($lines-- > 0) {
            list($model, $fuelAmount, $fuelCost) = explode(" ", readline());
            $car = new Car($model, $fuelAmount, $fuelCost);
            $this->cars[$model][] = $car;
        }
    }

}

$app = new App();
$app->Start();