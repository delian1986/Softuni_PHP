<?php


namespace Vehicles;


class Truck extends Vehicle
{
    protected function setFuelConsumption($fuelConsumption)
    {
        $this->fuelConsumption=$fuelConsumption+1.6;
    }

    public function Refuel($fuel)
    {
        $fuel=$fuel*0.95;
        $this->fuelQuantity+=$fuel;
    }
}