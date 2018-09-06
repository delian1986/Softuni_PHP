<?php
$str="hello";
$num=15;
$real=1.234;
$arr=[1,2,3];
$obj=(object)[2,34];

$container=[$str,$num,$real,$arr,$obj];

foreach ($container as $item) {
    if (is_numeric($item)){
       var_dump($item);
    }else{
        $type=gettype($item);
        print_r($type."\n");
    }
}
