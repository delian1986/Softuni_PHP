<?php


namespace Speed;


class Car
{
    private $model;
    private $fuelAmount;
    private $fuelCost;
    private $distanceTraveled=0;

    public function __construct($model,$fuelAmount,$fuelCost)
    {
        $this->model=$model;
        $this->fuelAmount=$fuelAmount;
        $this->fuelCost=$fuelCost;
    }

    public function Drive($amountOfKm){
        $fuelNeeded=$amountOfKm*$this->fuelCost;
        if ($fuelNeeded<=$this->fuelAmount){
            $this->fuelAmount-=number_format($fuelNeeded,2);
            $this->distanceTraveled+=number_format($amountOfKm,2);
        }else{
           echo "Insufficient fuel for the drive\n";
        }
    }

    public function __toString()
    {
        $fuelAmount=number_format($this->fuelAmount,2,'.','');
        return "$this->model $fuelAmount $this->distanceTraveled\n";
    }
}