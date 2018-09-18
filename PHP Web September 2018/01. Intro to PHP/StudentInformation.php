<?php

class Student
{
    private $name;
    private $age;
    private $grade;

    public function __construct(string $name,int $age,float $grade)
    {
        $this->name=$name;
        $this->age=$age;
        $this->grade=$grade;
    }

    public function __toString()
    {
        $formatedGrade=sprintf("%.2f",$this->grade);
        return "Name: $this->name, Age: $this->age, Grade: $formatedGrade\n";
    }
}

$name=readline();
$age=readline();
$grade=readline();

$student=new Student($name,$age,$grade);
echo $student;

