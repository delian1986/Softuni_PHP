<?php

namespace Google;


class Car
{

    private $model;
    private $speed;

    /**
     * Car constructor.
     * @param $model
     * @param $speed
     */
    public function __construct(string $model, int $speed)
    {
        $this->model = $model;
        $this->speed = $speed;
    }

    /**
     * @return mixed
     */
    public function getmodel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setmodel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     */
    public function setSpeed($speed): void
    {
        $this->speed = $speed;
    }

    public function __toString()
    {
        return "$this->model $this->speed\n";
    }


}