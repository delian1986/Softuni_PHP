<?php
$line = trim(fgets(STDIN));
$res = isPalidrome($line);
echo $res ? 'true' : 'false';

function isPalidrome($word)
{
    $mid = intval(strlen($word) / 2);
    $firstPart = "";
    $lastPart = "";
    if (strlen($word) % 2 == 0) {
        $firstPart = substr($word, 0, $mid);
        $lastPart = strrev(substr($word, $mid));

    } else {
        $firstPart = substr($word, 0, $mid);
        $lastPart = strrev(substr($word, $mid + 1));
    }
    return $firstPart == $lastPart;
}


