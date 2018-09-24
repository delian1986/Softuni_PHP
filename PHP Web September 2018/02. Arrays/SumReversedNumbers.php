<?php
$nums=explode(" ",(readline()));
$sum=0;

for ($i=0;$i<count($nums);$i++){
    $curr=strrev($nums[$i]);
    $sum+=intval($curr);
}
echo $sum;
