<?php


namespace Animals;


class Animal
{
    protected $name;
    protected $age;
    protected $gender;

    public function __construct(string $name,int $age,string $gender)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setGender($gender);
    }

    private function setGender($gender){
        if ($gender===""){
            throw new \Exception("Invalid input!");
        }
        $this->gender=$gender;
    }

    private function setAge($age){
        if ($age==="" or $age<1){
            throw new \Exception("Invalid input!");
        }
        $this->age=$age;
    }

    private function setName($name){
        if ($name===""){
            throw new \Exception("Invalid input!");
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