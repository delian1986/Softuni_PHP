<?php


namespace OpinionPoll;


class Person
{
    private $name;
    private $age;

    public function __construct($name,$age)
    {
        $this->name=$name;
        $this->age=$age;
    }

    public function getAge(){
        return $this->age;
    }

    public function getName(){
        return $this->name;
    }

    public function __toString()
    {
        return "$this->name - $this->age\n";
    }
}