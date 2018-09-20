<?php
$text=str_split(trim(fgets(STDIN)));
$letters=[];

foreach ($text as $item) {
    if (!array_key_exists($item,$letters)){
        $letters[$item]=0;
    }
    $letters[$item]++;
}

print_r($letters);
