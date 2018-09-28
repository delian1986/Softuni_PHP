<?php

class Person
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;

    }

    public function __toString()
    {
        return "$this->name says \"Hello\"!\n";
    }
}

$p=new Person(readline());
echo $p;