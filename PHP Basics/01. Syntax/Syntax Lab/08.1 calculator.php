<?php
if (isset($_GET["calculate"])){
    $operation=$_GET["operation"];
    $numOne=$_GET["number_one"];
    $numOTwo=$_GET["number_two"];
    $output="";
    switch ($operation){
        case "sum":
            $output=($numOne+$numOTwo);
            break;
        case "subtract":
            $output=($numOne-$numOTwo);
    }
}
include '08.1 calculator_frontend.php';

