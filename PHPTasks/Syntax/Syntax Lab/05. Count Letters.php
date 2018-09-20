<?php
$word=str_split(trim(fgets(STDIN)));
$letterCount=[];
foreach ($word as $letter) {
    if (!array_key_exists($letter,$letterCount)){
        $letterCount[$letter]=0;
    }
    $letterCount[$letter]++;
}

foreach ($letterCount as $key => $value) {
    echo $key." -> ".$value."\n";
}


