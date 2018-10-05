<?php


namespace Vehicles;


abstract class Vehicle
{
    protected $fuelQuantity;
    protected $fuelConsumption;
    protected $distanceTraveled;

    public function __construct($fuelQuantity, $fuelConsumption)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setFuelConsumption($fuelConsumption);
        $this->distanceTraveled = 0;
    }

    protected function setFuelQuantity($fuelQuantity)
    {
        $this->fuelQuantity = $fuelQuantity;
    }

    protected function setFuelConsumption($fuelConsumption)
    {
        $this->$fuelConsumption = $fuelConsumption;
    }

    public function Drive($distance)
    {
        list($namespace,$name) = explode("\\",get_class($this));
        if ($this->fuelQuantity < $distance * $this->fuelConsumption) {
            echo "$name needs refueling\n";
        } else {
            $this->setFuelQuantity($this->fuelQuantity - $distance * $this->fuelConsumption);
            $this->distanceTraveled += $distance;
            echo "$name travelled $distance km\n";
        }
    }

    abstract public function Refuel($fuel);

    public function __toString()
    {
        list($namespace,$name) = explode("\\",get_class($this));
        $formatedFuelQuantity = number_format(floatval($this->fuelQuantity), 2);
        return "$name: $formatedFuelQuantity\n";
    }
}