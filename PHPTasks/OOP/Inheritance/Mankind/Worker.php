<?php


namespace Mankind;


class Worker extends Human
{
    private $salary;
    private $workingHours;

    public function __construct(string $fname, string $lname, float $salary, float $workingHours)
    {
        parent::__construct($fname, $lname);
        $this->setLName($lname);
        $this->setSalary($salary);
        $this->setWorkingHours($workingHours);
    }

    private function setWorkingHours($workingHours)
    {
        if ($workingHours<1 or $workingHours>12){
            throw new \Exception("Expected value mismatch!Argument: workHoursPerDay\n");
        }

        $this->workingHours=$workingHours;
    }

    private function getWorkingHours(){
        return sprintf("%01.2f", $this->workingHours);
    }

    private function setSalary($salary)
    {
        if ($salary < 10) {
            throw new \Exception("Expected value mismatch!Argument: weekSalary\n");
        }
        $this->salary = $salary;
    }

    private function getSalary(){
        return sprintf("%01.2f", $this->salary);
    }

    protected function setLName($lname)
    {
        if (strlen($lname) < 3) {
            throw new \Exception("Expected length more than 3 symbols!Argument: lastName\n");
        }
        parent::setLName($lname);
    }

    private function calculateSalaryPerHour(){
        $salary=$this->salary;
        $hours=$this->workingHours;
        $salaryPerHour=$salary/(7*$hours);

        return sprintf("%01.2f", $salaryPerHour);
    }

    public function __toString()
    {
        $formatedSalary=$this->getSalary();
        $formatedHours=$this->getWorkingHours();
        $formatedSalatyPerHour=$this->calculateSalaryPerHour();

        $result=parent::__toString();
        $result.="Week Salary: $formatedSalary\n";
        $result.="Hours per day: $formatedHours\n";
        $result.="Salary per hour: $formatedSalatyPerHour\n";

        return $result;
    }
}