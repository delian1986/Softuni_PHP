<?php
list($rows, $cols) = explode(" ", readline());
$matrix = [];
$bestSquare = [];
$bestSum = PHP_INT_MIN;

for ($i = 0; $i < $rows; $i++) {
    $matrix[] = explode(" ", readline());
}

for ($row = 0; $row < count($matrix) - 3; $row++) {
    for ($col = 0; $col < count($matrix[0]) - 3; $col++) {
        $currElement1 = $matrix[$row][$col];
        $currElement2 = $matrix[$row][$col + 1];
        $currElement3 = $matrix[$row][$col + 2];
        $currElement4 = $matrix[$row + 1][$col];
        $currElement5 = $matrix[$row + 1][$col + 1];
        $currElement6 = $matrix[$row + 1][$col + 2];
        $currElement7 = $matrix[$row + 2][$col];
        $currElement8 = $matrix[$row + 2][$col + 1];
        $currElement9 = $matrix[$row + 2][$col + 2];

        $currSum = $currElement1 + $currElement2 + $currElement3 + $currElement4 + $currElement5 + $currElement6 + $currElement7 + $currElement8 + $currElement9;
        if ($bestSum < $currSum) {
            $bestSum = $currSum;
            $bestSquare = [];
            $bestSquare[] = [$currElement1, $currElement2, $currElement3];
            $bestSquare[] = [$currElement4, $currElement5, $currElement6];
            $bestSquare[] = [$currElement7, $currElement8, $currElement9];
        }
    }
}

echo "Sum = " . $bestSum . PHP_EOL;
echo implode(" ", $bestSquare[0]) . PHP_EOL;
echo implode(" ", $bestSquare[1]) . PHP_EOL;
echo implode(" ", $bestSquare[2]) . PHP_EOL;


