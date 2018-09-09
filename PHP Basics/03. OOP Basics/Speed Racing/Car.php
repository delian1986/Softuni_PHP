<?php

namespace Speed;
class Car
{
    private $model;
    private $fuelAmount;
    private $fuelCost;
    private $distance = 0;

    function __construct($model, $fuelAmount, $fuelCost)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCost = $fuelCost;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getFuelAmount()
    {
        return $this->fuelAmount;
    }

    /**
     * @param mixed $fuelAmount
     */
    public function setFuelAmount($fuelAmount): void
    {
        $this->fuelAmount = $fuelAmount;
    }

    /**
     * @return mixed
     */
    public function getFuelCost()
    {
        return $this->fuelCost;
    }

    /**
     * @param mixed $fuelCost
     */
    public function setFuelCost($fuelCost): void
    {
        $this->fuelCost = $fuelCost;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     */
    public function setDistance(int $distance): void
    {
        $this->distance = $distance;
    }

    public function drive($amountKm)
    {
        $fuelCostPerCurrDistance = $amountKm * $this->fuelCost;
        $fuelLeft = $this->fuelAmount - $fuelCostPerCurrDistance;

        if ($fuelLeft >= 0) {
            $this->fuelAmount = $fuelLeft;
            $this->distance += $amountKm;
        } else {
            print_r("Insufficient fuel for the drive\n");
        }
    }

    public function __toString()
    {
        $formatedFuel = round(number_format($this->fuelAmount, 2),2);
        return "$this->model $formatedFuel $this->distance\n";
    }

}