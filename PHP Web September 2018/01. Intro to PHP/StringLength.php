<?php
$text=readline();
if (strlen($text)<=20){
    $length=strlen($text);
    $asterixCount=20-$length;
    $text=$text.str_repeat("*",$asterixCount);
    echo $text;
}else{
    $text=substr($text,0,20);
    echo $text;
}


