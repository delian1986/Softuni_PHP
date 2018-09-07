<?php
$line = explode(", ", trim(fgets(STDIN)));
$towns=[];
for ($i = 0; $i < count($line); $i+=2) {
    list($town,$income)=[$line[$i],$line[$i+1]];

    if (!isset($towns[$town])){
        $towns[$town]=0;
    }
    $towns[$town]+=$income;
}
print_r($towns);
