<?php

namespace iPerson;

require "iPerson.php";
require "iIdentifiable.php";
require "iBirthable.php";

class Citizen implements iPerson,iIdentifiable,iBirthable
{
    private $name;
    private $age;
    private $id;
    private $bDay;

    public function __construct(string $name, int $age,int $id,string $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthDate);
    }

    function setBirthdate(string $bDate)
    {
        $this->bDay=$bDate;
    }

    function setName(string $name)
    {
        $this->name = $name;
    }

    function setAge(int $age)
    {
        $this->age = $age;
    }

    public function setId(int $id)
    {
        $this->id=$id;
    }

    public function __toString()
    {
        return "$this->name\n$this->age\n$this->id\n$this->bDay";
    }
}