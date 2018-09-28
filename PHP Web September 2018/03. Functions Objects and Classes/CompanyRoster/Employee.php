<?php


namespace CompanyRoster;


class Employee
{
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;

    public function __construct($name, $salary, $position, $department, $email = null, $age = null)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->setDepartment($department);
        $this->setAge($age);
        $this->setEmail($email);
    }

    public function setDepartment($department)
    {
        $this->department = $department;
    }

    public function getSalary(){
        return sprintf(sprintf("%01.2f", $this->salary));
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getDepartment()
    {
        return $this->department;
    }

    public function __toString()
    {
        $salary=$this->getSalary();
        $email=$this->email?$this->email:"n/a";
        $age=$this->age?$this->age:"-1";
        return "$this->name $salary $email $age\n";
    }
}