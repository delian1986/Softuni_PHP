<?php
$text=readline();
$letters="";
$digits="";
$other="";

for ($i=0;$i<strlen($text);$i++){
    if (ctype_alpha($text[$i])){
        $letters.=$text[$i];
    }else if(is_numeric($text[$i])){
        $digits.=$text[$i];
    }else{
        $other.=$text[$i];
    }
}

echo $digits."\n";
echo $letters."\n";
echo $other."\n";

