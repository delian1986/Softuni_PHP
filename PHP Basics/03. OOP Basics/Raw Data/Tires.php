<?php

namespace RawData;


class Tires
{
    private $pressure;
    private $age;
    /**
     * Tires constructor.
     * @param $tears
     */
    public function __construct($tirePressure, $tireAge)
    {
       $this->pressure=$tirePressure;
       $this->age=$tireAge;
    }

    /**
     * @return mixed
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * @param mixed $pressure
     */
    public function setPressure($pressure): void
    {
        $this->pressure = $pressure;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }


}