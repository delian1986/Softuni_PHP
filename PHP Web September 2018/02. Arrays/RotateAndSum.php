<?php
$arr = explode(" ", readline());
$nTimes = intval(readline());
$sumArray=[];

for ($i = 0; $i<$nTimes; $i++) {
    $lastElement=array_pop($arr);
    array_unshift($arr,$lastElement);
    for ($k=0;$k<count($arr);$k++){
        $sumArray[$k]+=$arr[$k];
    }
}
echo implode(" ",$sumArray);


