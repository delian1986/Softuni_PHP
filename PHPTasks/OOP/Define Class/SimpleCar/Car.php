<?php

class Car
{
    private $brand;
    private $model;
    private $year;
    private $extraDetails;

    function __construct($brand, $model,$engine,$numberOfSeats,$horsePower)
    {
        $this->brand=$brand;
        $this->model=$model;
        $this->extraDetails=new ExtraDetails($engine,$numberOfSeats,$horsePower);
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year): void
    {
        $this->year = $year;
    }

    public function setBrand($value){
        $this->brand=$value;
    }

    public function getBrand(){
        return $this->brand;
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

    public function print(){
        return "$this->brand, $this->model, $this->year \n";
    }
}

class ExtraDetails{
    private $engine;
    private $numberOfSeats;
    private $horsePower;

    function __construct($engine,$numberOfSeats,$horsePower)
    {
        $this->engine=$engine;
        $this->numberOfSeats=$numberOfSeats;
        $this->horsePower=$horsePower;
    }

    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @param mixed $engine
     */
    public function setEngine($engine): void
    {
        $this->engine = $engine;
    }

    /**
     * @return mixed
     */
    public function getNumberOfSeats()
    {
        return $this->numberOfSeats;
    }

    /**
     * @param mixed $numberOfSeats
     */
    public function setNumberOfSeats($numberOfSeats): void
    {
        $this->numberOfSeats = $numberOfSeats;
    }

    /**
     * @return mixed
     */
    public function getHorsePower()
    {
        return $this->horsePower;
    }

    /**
     * @param mixed $horsePower
     */
    public function setHorsePower($horsePower): void
    {
        $this->horsePower = $horsePower;
    }
}