<?php

namespace Google;



class Company
{
    private $name;
    private $department;
    private $salary;

    /**
     * Company constructor.
     * @param $department
     * @param $salary
     */
    public function __construct(string $name, string $department, float $salary)
    {
        $this->name=$name;
        $this->department = $department;
        $this->salary = $salary;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @param float $salary
     */
    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __toString()
    {
        $salary=number_format($this->salary,2);
        return "$this->name $this->department $salary\n";
    }

}