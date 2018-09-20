<?php
namespace Hello;


class Person
{
    private $name;

    public function __construct($name)
    {
        $this->name=$name;
    }

    public function sayHello()
    {
        return "$this->name says \"Hello\"!";
    }
}