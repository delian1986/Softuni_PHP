<?php
$startPosition = readline();
$wordDirections = ["North", "East", "South", "West"];
$dirLength = count($wordDirections);
$currPos = array_search($startPosition, $wordDirections);
while (1) {
    $degrees = intval(readline());
    if ($degrees == "END") {
        break;
    }
//    print_r($currPos . PHP_EOL);
    $steps = abs($degrees / 45);
    if ($degrees > 0) {
        $currPos = ($currPos + $steps) % $dirLength;
    } else {
        $currPos = ($currPos - $steps) % $dirLength;
        if ($currPos<0){
            $currPos=$dirLength-abs($currPos);
        }
    }
}

$endPosition=$wordDirections[$currPos];
echo "Starting Position: $startPosition\n";
echo "Position After Rotating: $endPosition\n";


