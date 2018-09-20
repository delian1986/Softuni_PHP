<?php

namespace Sales;

class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    /**
     * Engine constructor.
     * @param $model
     * @param $power
     * @param $displacement
     * @param $efficiency
     */
    public function __construct(string $model, int $power, int $displacement = null, string $efficiency = null)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }

    /**
     * @param int $power
     */
    public function setPower(int $power): void
    {
        $this->power = $power;
    }

    /**
     * @return string
     */
    public function getDisplacement(): string
    {
        return $this->displacement;
    }

    /**
     * @param int $displacement
     */
    public function setDisplacement(int $displacement): void
    {
        $this->displacement = $displacement;
    }

    /**
     * @return string
     */
    public function getEfficiency(): string
    {
        return $this->efficiency;
    }

    /**
     * @param string $efficiency
     */
    public function setEfficiency(string $efficiency): void
    {
        $this->efficiency = $efficiency;
    }

    public function __toString()
    {
        $displacement=$this->displacement==null?"n/a":$this->displacement;
        $efficiency=$this->efficiency==null?"n/a":$this->efficiency;

        return "$this->model:
    Power: $this->power
    Displacement: $displacement
    Efficiency: $efficiency";
    }
}

