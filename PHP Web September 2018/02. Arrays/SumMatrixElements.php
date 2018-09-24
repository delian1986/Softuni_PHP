<?php
list($rows,$cols) = explode(", ",readline());
$matrix = [];
$resultSum=0;

for ($i = 0; $i < $rows; $i++) {
    $row=explode(", ",readline());
    $resultSum+=array_sum($row);
    $matrix[]=$row;
}

echo $rows.PHP_EOL;
echo $cols.PHP_EOL;
echo $resultSum.PHP_EOL;

