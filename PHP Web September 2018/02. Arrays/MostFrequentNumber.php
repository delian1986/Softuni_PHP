<?php
$sequence=explode(" ",readline());
$allNums=[];

for ($i=0; $i<count($sequence);$i++){
    if (!isset($allNums[$sequence[$i]])){
        $allNums[$sequence[$i]]=0;
    }
    $allNums[$sequence[$i]]++;
}

arsort($allNums);
reset($allNums);

echo $best=key($allNums);




