<?php


class Animal
{
    protected $name;
    protected $age;
    protected $gender;

    public function __construct( $name, $age, $gender)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setGender($gender);
    }

    protected function setGender($gender){

        if ($gender!=="Male" and $gender!=="Female"){
            throw new Exception("Invalid input!");
        }
        $this->gender=$gender;
    }

    protected function setAge($age){
        if ($age<0 or $age===""){
            throw new Exception("Invalid input!\n");
        }
        $this->age=$age;
    }

    protected function setName($name){
        if (!strlen($name)){
            throw new Exception("Invalid input!\n");
        }
        $this->name=$name;
    }

    protected function produceSound():string {
        return "Not implemented!\n";
    }

    public function __toString()
    {
        $className=get_class($this);
        $name=$this->name;
        $age=$this->age;
        $gender=$this->gender;

        $result="$className $name $age $gender\n";
        $result.=$this->produceSound();

        return $result;
    }
}