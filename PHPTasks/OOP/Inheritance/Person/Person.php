<?php


namespace Person;


class Person
{
    protected $name;
    protected $age;

    public function __construct(string $name,int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    protected function setName(string $name){
        if (strlen($name)<3){
            throw new \Exception("Name’s length should not be less than 3 symbols!\n");
        }
        $this->name=$name;
    }

    protected function setAge(int $age){
        if ($age<1){
            throw new \Exception("Age must be positive!\n");
        }
        $this->age=$age;
    }

    public function __toString()
    {
        return "$this->name is $this->age years old.";
    }

}