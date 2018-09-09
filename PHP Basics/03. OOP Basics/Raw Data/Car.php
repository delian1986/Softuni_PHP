<?php

namespace RawData;
include_once "Cargo.php";
include_once "Engine.php";
include_once "Tires.php";

class Car
{
    private $model;
    private $engine;
    private $cargo;
    private $tires=[];

    function __construct($model,$engineSpeed,$enginePower,$cargoWeight,$cargoType,$tire1,$tire2,$tire3,$tire4)
    {
        $this->model=$model;
        $this->engine=new Engine($engineSpeed,$enginePower);
        $this->cargo=new Cargo($cargoWeight,$cargoType);
        array_push($this->tires,$tire1,$tire2,$tire3,$tire4);
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
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @param Engine $engine
     */
    public function setEngine(Engine $engine): void
    {
        $this->engine = $engine;
    }

    /**
     * @return Cargo
     */
    public function getCargo(): Cargo
    {
        return $this->cargo;
    }

    /**
     * @param Cargo $cargo
     */
    public function setCargo(Cargo $cargo): void
    {
        $this->cargo = $cargo;
    }

    /**
     * @return array
     */
    public function getTires(): array
    {
        return $this->tires;
    }

    /**
     * @param array $tires
     */
    public function setTires(array $tires): void
    {
        $this->tires = $tires;
    }



    public function __toString()
    {
        return "$this->model\n";
    }


}