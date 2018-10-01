<?php

namespace Person;
require "iPerson.php";


class Citizen implements iPerson
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    function setName(string $name)
    {
        $this->name = $name;
    }

    function setAge(int $age)
    {
        $this->age = $age;
    }

    public function __toString()
    {
        return "$this->name\n$this->age\n";
    }
}