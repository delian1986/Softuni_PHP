<?php
$contacts=[];

while (1){
    $line=readline();
    if ($line=="Over"){
        break;
    }
    list($arg1,$arg2)=explode(" : ",$line);
    $name="";
    $phone="";

    if (ctype_digit($arg1)){
        $name=$arg2;
        $phone=$arg1;
    }else{
        $name=$arg1;
        $phone=$arg2;
    }
    $contacts[$name]=$phone;
}

ksort($contacts);

foreach ($contacts as $name => $phone) {
    echo "$name -> $phone\n";
}
