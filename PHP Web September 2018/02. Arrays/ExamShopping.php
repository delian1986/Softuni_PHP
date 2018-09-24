<?php
$stock=[];

while (1){
    $line=readline();
    if ($line=="exam time"){
        break;
    }
    else if ($line=="shopping time"){
        continue;
    }

    list($action,$item,$quantity)=explode(" ",$line);

    switch ($action){
        case "stock":
            $stock=addToStock($item,$quantity,$stock);
            break;
        case "buy":
            $stock=buyItem($item,$quantity,$stock);
            break;
    }
}

$resultArray=array_filter($stock,function ($a){
    return $a>0;
});

foreach ($resultArray as $item => $quantity) {
    echo "$item -> $quantity\n";
}

function buyItem($item,$quantity,$stock):array
{
    if (!isset($stock[$item])){
        echo "$item doesn't exist\n";
    }else if($stock[$item]==0){
        echo "$item out of stock\n";
    }else{
        $currQuantity=$stock[$item];
        $result=$currQuantity-$quantity;
        $stock[$item]=$result>0?$result:0;
    }
    return $stock;
}

function addToStock($item,$quantity,$stock):array {
    if (!isset($stock[$item])){
        $stock[$item]=0;
    }
    $stock[$item]+=$quantity;
    return $stock;
}
