<?php

$str=readline();
$mid=floor(strlen($str)/2);
$firstPart=substr($str,0,$mid);
$lastPart=substr(strrev($str),0,$mid);
$isPalidrome=true;
strrev($lastPart);

for ($i=0;$i<$mid;$i++){
    if ($firstPart[$i]!==$lastPart[$i]){
        $isPalidrome=false;
        break;
    }
}

if ($isPalidrome){
    echo "true";
}else{
    echo "false";
}

