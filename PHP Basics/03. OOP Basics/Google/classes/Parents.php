<?php

namespace Google;
include_once "../config.php";


class Parents
{
    private $name;
    private $bDay;

    /**
     * Parents constructor.
     * @param $name
     * @param $bDay
     */
    public function __construct(string $name, string $bDay)
    {
        $this->name = $name;
        $this->bDay = $bDay;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBDay()
    {
        return $this->bDay;
    }

    /**
     * @param mixed $bDay
     */
    public function setBDay($bDay): void
    {
        $this->bDay = $bDay;
    }


}