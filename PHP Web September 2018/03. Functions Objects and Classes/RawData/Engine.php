<?php


namespace RawData;


class Engine
{
    private $engineSpeed;
    private $enginePower;

    public function __construct(int $engineSpeed,int $enginePower)
    {
        $this->engineSpeed=$engineSpeed;
        $this->enginePower=$enginePower;
    }

    public function getEnginePower():int{
        return $this->enginePower;
    }
}