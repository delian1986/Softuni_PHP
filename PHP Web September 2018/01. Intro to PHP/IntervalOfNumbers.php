<?php
$num1=intval(readline());
$num2=intval(readline());

$min=min($num1,$num2);
$max=max($num1,$num2);

for ($i=$min;$i<=$max;$i++){
    echo $i."\n";
}
