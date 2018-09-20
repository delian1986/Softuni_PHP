<?php


namespace Inheritance;
include_once 'Vehicle.php';

class Car extends Vehicle
{
    private $brand;
    private $model;
    private $year;

    public function __construct(int $numberDoors, string $color, string $brand, string $model, int $year)
    {
        parent::__construct($numberDoors, $color);
        $this->setBrand($brand);
        $this->setModel($model);
        $this->setYear($year);
    }

    private function setBrand(string $brand){
        $this->brand=$brand;
    }
    private function setModel(string $model){
        $this->model=$model;
    }
    private function setYear(int $year){
        $this->year=$year;
    }

    public function paint($newColor){
        $this->color=$newColor;
    }
}