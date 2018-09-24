<?php
$arr = explode(" ", readline());
$endIndex = 0;
$count = 1;
$best = 0;

for ($i = 0; $i < count($arr) - 1; $i++) {
    if ($arr[$i] == $arr[$i + 1]) {
        $count++;
        if ($count > $best) {
            $best = $count;
            $endIndex = $i + 1;
        }
    } else {
        $count = 1;
    }
}

if ($best > 1) {
    $startIndex = $endIndex - $best;
    $bestNum = array_slice($arr, $startIndex + 1, $best);
    echo implode(" ", $bestNum);
}else{
    echo $arr[0];
}


