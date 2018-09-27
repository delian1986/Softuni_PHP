<?php


namespace Person;


class Child extends Person
{
    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age);
    }

    protected function setAge(int $age)
    {
        if ($age>15){
            throw new \Exception("Child’s age must be less than 16!\n");
        }
        parent::setAge($age);
    }
}