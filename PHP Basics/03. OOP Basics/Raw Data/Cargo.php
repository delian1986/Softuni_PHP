<?php

namespace RawData;


class Cargo
{
    private $cargoWeight;
    private $cargoType;

    function __construct($cargoWeight,$cargoType)
    {
        $this->cargoWeight=$cargoWeight;
        $this->cargoType=$cargoType;
    }


}