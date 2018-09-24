<?php
$n = intval(readline());
$k = intval(readline());
$nums = [];
$nums[0] = 1;

for ($i = 1; $i < $n; $i++) {
    $sum = 0;
    if (count($nums)<$k){
        $sum=array_sum($nums);
    }else{
        $lastNums=array_slice($nums,-$k,$k);
        $sum=array_sum($lastNums);
    }
    $nums[]=$sum;

}

echo implode(" ",$nums);
