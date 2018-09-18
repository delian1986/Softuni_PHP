<?php
$num=intval(readline());
$multi=intval(readline());
$result=0;

if ($multi>10){
    $result=$num*$multi;
    echo "$num X $multi = $result\n";
}else{
    for ($i=$multi;$i<=10;$i++){
        $result=$num*$i;
        echo "$num X $i = $result\n";
    }
}

