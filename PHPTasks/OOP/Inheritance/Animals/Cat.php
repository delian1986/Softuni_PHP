<?php


namespace Animals;


class Cat extends Animal
{
    public function __construct(string $name, int $age, string $gender)
    {
        parent::__construct($name, $age, $gender);
    }

    protected function produceSound(): string
    {
        return "MiauMiau";
    }
}