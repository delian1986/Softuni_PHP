<?php
$arr = explode(" ", readline());

while (count($arr) > 1) {
    $tempArr = [];
    for ($i = 0; $i < count($arr) - 1; $i++) {
        $tempArr[] = $arr[$i] + $arr[$i + 1];
    }
    $arr = $tempArr;
}

echo implode(" ", $arr);



