<?php

namespace RawData;


class Car
{
    private $model;
    private $engine;
    private $cargo;
    private $tires;

    public function __construct(string $model, Engine $engine, Cargo $cargo, array $tires)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
        $this->tires = $tires;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getEnginePower(): int
    {
        return $this->engine->getEnginePower();
    }

    public function getCargoType():string {
        return $this->cargo->getType();
    }

    public function getTirePressure():bool {

        foreach ($this->tires as $tyre){
            if ($tyre->getPressure()<1){
                return true;
            }
        }
        return false;
    }

    public function __toString()
    {
     return "$this->model\n";
    }

}