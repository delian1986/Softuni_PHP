<?php


namespace RawData;


class Engine
{
    private $engineSpeed;
    private $enginePower;

    public function __construct($engineSpeed,$enginePower)
    {
        $this->engineSpeed=$engineSpeed;
        $this->enginePower=$enginePower;
    }

    public function getEnginePower(){
        return $this->enginePower;
    }


}