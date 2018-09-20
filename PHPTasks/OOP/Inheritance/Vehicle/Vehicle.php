<?php

namespace Inheritance;


class Vehicle
{
    private $numberDoors;
    protected $color;

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
        if ($this->{$name}){
            return $this->{$name};
        }else{
            return "property doesn’t exist";
        }
    }

    private function setDoors(int $numberDoors)
    {
        if ($numberDoors>0){
            $this->numberDoors=$numberDoors;
        }
    }

    private function setColor(string $color){
        $this->color=$color;
    }


}