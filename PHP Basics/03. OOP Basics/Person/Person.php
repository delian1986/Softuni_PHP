<?php

class Person
{
    public $name;
    public $age;


    function __construct(string $name,int $age)
    {
        $this->age=$age;
        $this->name=$name;

    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    function __toString()
    {
        return "$this->name - $this->age"."\n";

    }

}


