<?php
$line = explode(", ", trim(fgets(STDIN)));
$uniqueElements=[];
foreach ($line as $item) {
    if (($index=array_search($item,$uniqueElements))!==false){
        unset($uniqueElements[$index]);
    }else{
        array_push($uniqueElements,$item);
    }
}

echo (implode(" ",$uniqueElements));
