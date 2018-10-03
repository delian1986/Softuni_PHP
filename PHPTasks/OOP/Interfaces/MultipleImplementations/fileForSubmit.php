<?php

namespace iPerson;


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



interface iBirthable
{
    function setBirthdate(string $bDate);
}



interface iIdentifiable
{
    public function setId(int $id);
}


$name=readline();
$age=intval(readline());
$id=intval(readline());
$bDate=readline();

$myCitizen = new Citizen($name, $age,$id,$bDate);
echo $myCitizen;




interface iPerson
{
  function setName(string $name);
  function setAge(int $age);
}

