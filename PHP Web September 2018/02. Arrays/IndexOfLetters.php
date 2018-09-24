<?php
$letters = strtolower(readline());

for ($i = 0; $i < strlen($letters); $i++) {
    $ascii=ord($letters[$i])-97;
    echo "$letters[$i] -> $ascii\n";
}


