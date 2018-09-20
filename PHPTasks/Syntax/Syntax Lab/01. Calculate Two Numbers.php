<?php
$operation = $argv[1];
$numOne = intval(fgets(STDIN));
$numTwo = intval(fgets(STDIN));

if ($operation == "sum") {
    echo " == " . ($numOne + $numTwo);
} else if ($operation == "subtract") {
    echo " == " . ($numOne - $numTwo);
} else {
    echo " === Wrong operation supplied";
}
?>

