<?php

namespace Encapsulation;


class Vehicle
{
    private $numberDoors;
    private $color;

    public function __construct(int $numberDoors, string $color)
    {
        $this->setDoors($numberDoors);
        $this->setColor($color);
    }

    public function getDoors():int{
        return $this->numberDoors;
    }

    public function getColor():string {
        return $this->color;
    }

    public function __get($name)
    {
        if (property_exists(Vehicle,$name)){

        }
    }

    public function setDoors(int $numberDoors)
    {
        if ($numberDoors>0){
            $this->numberDoors=$numberDoors;
        }
    }

    public function setColor(string $color){
        $this->color=$color;
    }


}