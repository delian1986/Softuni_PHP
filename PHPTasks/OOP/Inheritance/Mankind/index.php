<?php
//75/100

namespace Mankind;
require "Human.php";
require "Student.php";
require "Worker.php";

list($studFname, $studlname, $facNum) = explode(" ", readline());
list($workFname, $workLname, $salary,$workingHours) = explode(" ", readline());
$err=false;

try {
    $student = new Student($studFname, $studlname, $facNum);
    $worker=new Worker($workFname, $workLname, $salary,$workingHours);
}catch (\Exception $e){
    $err=true;
    echo $e->getMessage();
}

if(!$err){
    echo $student;
    echo $worker;
}

