<?php

namespace Google;


class Children
{
    private $name;
    private $bDay;

    /**
     * Children constructor.
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
    public function getName():string
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
    public function __toString()
    {
        return "$this->name $this->bDay\n";
    }

}