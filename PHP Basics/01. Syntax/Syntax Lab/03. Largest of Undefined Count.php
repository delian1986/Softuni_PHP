<?php
$maxNum=0;
while (true){
    $line=trim(fgets(STDIN));
    if (empty($line)){
        break;
    }
    $number=intval($line);
    if ($number>$maxNum){
        $maxNum=$number;
    }
}

echo "Max: ".$maxNum;