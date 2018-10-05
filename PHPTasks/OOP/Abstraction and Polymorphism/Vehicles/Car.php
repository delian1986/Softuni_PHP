<?php


namespace Vehicles;


class Car extends Vehicle
{
    protected function setFuelConsumption($fuelConsumption)
    {
        $this->fuelConsumption=$fuelConsumption+0.9;
    }

    public function Refuel($fuel)
    {
        $this->fuelQuantity+=$fuel;
    }

}