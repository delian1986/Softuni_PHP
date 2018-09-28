<?php




class Kitten extends Cat
{
    public function __construct($name, $age, $gender)
    {

        parent::__construct($name, $age, $gender);
    }

    protected function setGender($gender)
    {
        if ($gender!=="Female"){
            throw new Exception("Invalid input!");
        }
        $this->gender=$gender;
    }

    protected function produceSound():string
    {
        return "Miau\n";
    }
}