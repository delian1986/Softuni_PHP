<?php


class Tomcat extends Cat
{
    public function __construct($name, $age, $gender)
    {
        parent::__construct($name, $age, $gender);
    }

    protected function produceSound(): string
    {
        return "Give me one million b***h\n";
    }

    protected function setGender($gender)
    {
        if ($gender !== "Male") {
            throw new Exception("Invalid input!");
        }
        $this->gender = $gender;

    }
}