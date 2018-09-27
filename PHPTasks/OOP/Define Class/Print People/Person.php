<?php

namespace PrintPeople;


class Person
{
    public $name;
    public $age;
    public $occupation;

    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function __toString()
    {
        return "$this->name - age: $this->age, occupation: $this->occupation\n";
    }
}

