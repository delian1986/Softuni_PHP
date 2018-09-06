<?php
$str = trim(fgets(STDIN));
$strLength = strlen($str);

if ($strLength < 20) {
    $asterixCount = 20 - $strLength;
    echo $str . str_repeat("*", $asterixCount);
} else {
    $str = substr($str, 0, 20);
    echo $str;
}
