<?php
include_once "Person.php";

class Employee extends Person
{
    private $salary;
    private $position;
    private $department;
    private $email;

    function __construct(string $name, float $salary, string $position,string $department,string $email="n/a",int $age=-1)
    {
        parent::__construct($name,$age);
        $this->salary=$salary;
        $this->position=$position;
        $this->department=$department;
        $this->email=$email;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position): void
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department): void
    {
        $this->department = $department;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function __toString(){
        $roundedSalary=number_format($this->salary,2);
        return "$this->name $roundedSalary $this->email $this->age"."\n";
    }

}