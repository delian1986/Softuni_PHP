<?php

$numOne=intval(fgets(STDIN));
$numTwo=intval(fgets(STDIN));
$numThree=intval(fgets(STDIN));

$largestNum=$numOne;

if ($numTwo>$numOne){
    $largestNum=$numTwo;
}

if ($numThree>$numTwo){
    $largestNum=$numThree;
}

echo "Max: ".$largestNum;
