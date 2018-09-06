<?php
$num=intval(fgets(STDIN));
$maxNum=PHP_INT_MIN;

for ($i=0;$i<$num;$i++){
    $currNum=intval(fgets(STDIN));
    if ($currNum>$maxNum){
        $maxNum=$currNum;
    }
}

echo "Max: ".$maxNum;

