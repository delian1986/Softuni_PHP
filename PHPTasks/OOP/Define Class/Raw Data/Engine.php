<?php

namespace RawData;


class Engine
{
    private $engineSpeed;
    private $enginePower;

    /**
     * Engine constructor.
     * @param $engine
     */
    public function __construct($engineSpeed,$enginePower)
    {
        $this->engineSpeed=$engineSpeed;
        $this->enginePower=$enginePower;
    }

    /**
     * @return mixed
     */
    public function getEngineSpeed()
    {
        return $this->engineSpeed;
    }

    /**
     * @param mixed $engineSpeed
     */
    public function setEngineSpeed($engineSpeed): void
    {
        $this->engineSpeed = $engineSpeed;
    }

    /**
     * @return mixed
     */
    public function getEnginePower()
    {
        return $this->enginePower;
    }

    /**
     * @param mixed $enginePower
     */
    public function setEnginePower($enginePower): void
    {
        $this->enginePower = $enginePower;
    }

}