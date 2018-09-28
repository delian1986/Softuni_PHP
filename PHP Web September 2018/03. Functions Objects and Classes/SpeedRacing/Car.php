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
        $fuelNeeded=round($amountOfKm*$this->fuelCost,2);
        if ($fuelNeeded<=$this->fuelAmount){
            $this->fuelAmount-=$fuelNeeded;
            $this->distanceTraveled+=$amountOfKm;
        }else{
           echo "Insufficient fuel for the drive\n";
        }
    }

    public function __toString()
    {
        $fuelAmount=sprintf("%01.2f", round($this->fuelAmount,2));
        return "$this->model $fuelAmount $this->distanceTraveled\n";
    }
}