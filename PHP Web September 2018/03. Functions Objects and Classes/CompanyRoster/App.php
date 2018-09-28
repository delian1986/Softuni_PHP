<?php


namespace CompanyRoster;
include_once "Employee.php";

class App
{
    /**
     * @var Employee $people
     */
    private $people = [];

    public function start()
    {
        $this->proceed();
    }

    private function proceed()
    {
        $rows = intval(readline());
        $this->createEmployeeClass($rows);
        $bestDepartment=$this->getHighestAvgSalaryDepartment();
        $this->sortBySalary($bestDepartment);
        $this->printResult($bestDepartment);
    }

    private function printResult($bestDepartment){
        $depart=$bestDepartment[0]->getDepartment();
        echo "Highest Average Salary: $depart\n";
        foreach ($bestDepartment as $employees){
            echo $employees;
        }
    }

    private function sortBySalary(&$bestDepartment){
        usort($bestDepartment,function ($a,$b){
            return $b->getSalary()<=>$a->getSalary();
        });
    }

    private function getHighestAvgSalaryDepartment(){
        $bestAvgDeparment="";
        $bestAvg=0;
        foreach ($this->people as $department =>$val){
            $currSumSalary=0;
            foreach ($this->people[$department] as $person){
                $currSumSalary+=$person->getSalary();
            }
            if ($currSumSalary>$bestAvg){
                $bestAvg=$currSumSalary/count($this->people[$department]);
                $bestAvgDeparment=$department;
            }
        }
        return $this->people[$bestAvgDeparment];
    }
    private function createEmployeeClass($rows)
    {
        for ($i = 0; $i < $rows; $i++) {
            $args = explode(" ", readline());
            list($name, $salary, $position, $department) = $args;
            $employee = new Employee($name, $salary, $position, $department);
            if (count($args) > 4) {
                $email = $args[4];
                $employee->setEmail($email);
            }
            if (count($args) > 5) {
                $age = $args[5];
                $employee->setAge($age);
            }
            $this->addEmployeeToPeople($employee);
        }
    }

    private function addEmployeeToPeople(Employee $employee)
    {
        $currDepartment = $employee->getDepartment();

            $this->people[$currDepartment][] = $employee;
    }
}

$app=new App();
$app->start();