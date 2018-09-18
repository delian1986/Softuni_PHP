<?php
$maxNum = intval(readline());
$result = [];
if ($maxNum > 999) {
    $maxNum = 987;
}

for ($i = 102; $i <= $maxNum; $i++) {
    $firstDigit = ((string)$i)[0];
    $secondDigit = ((string)$i)[1];
    $thirdDigit = ((string)$i)[2];

    if ($firstDigit == $secondDigit || $firstDigit == $thirdDigit || $secondDigit == $thirdDigit) {
        continue;
    }
    $result[] = $i;
}

echo count($result) ? join(", ", $result) : "no";

