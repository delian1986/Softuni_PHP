<?php
require "Person.php";
require "Employee.php";
$employees = [];
$lines = intval(fgets(STDIN));
for ($i = 0; $i < $lines; $i++) {
    $args = explode(" ", trim(fgets(STDIN)));
    if (count($args) == 6) {
        list($name, $salary, $position, $department, $email, $age) = $args;
        $currEmployee = new Employee($name, $salary, $position, $department, $email, $age);
    } else if (count($args) == 5) {
        list($name, $salary, $position, $department, $optimal) = $args;
        $currEmployee = new Employee($name, $salary, $position, $department, $optimal);
    } else if (count($args) == 4) {
        list($name, $salary, $position, $department) = $args;
        $currEmployee = new Employee($name, $salary, $position, $department);
    }
    $employees[] = $currEmployee;
}
$groups = [];
$departmentsAvgSalary = [];
foreach ($employees as $emp) {
    $groups[$emp->getDepartment()][] = $emp;
}
foreach ($groups as $department => $person) {
    $salary = 0;
    $count = count($person);
    foreach ($person as $pers) {
        $salary += $pers->getSalary();
    }
    $avgSalary = $salary / $count;
    $departmentsAvgSalary[$department] = $avgSalary;
}

arsort($departmentsAvgSalary);
foreach ($departmentsAvgSalary as $key => $item) {
    echo "Highest Average Salary: $key\n";
    usort($groups[$key],function ($a,$b){
       return $b->getSalary()<=>$a->getSalary();
    });
    foreach ($groups[$key] as $person){
        echo $person;
    }
    break;
}



