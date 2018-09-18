<?php
$amountOfNums=intval(readline());
$counter=0;
$sum=0;
$nums=1;

while (1){
    if ($counter===$amountOfNums){
        break;
    }
    $sum+=$nums;
    echo "$nums\n";
    $nums+=2;
    $counter++;
}

echo "Sum: ".$sum;



