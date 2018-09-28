<?php
$quiz=explode(", ",readline());
$result=generateXml($quiz);
echo $result;

function generateXml($quiz)
{
    $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>".PHP_EOL;
    $xml.="<quiz>".PHP_EOL;

    for ($i=0;$i<count($quiz);$i+=2){
        $question=$quiz[$i];
        $answer=$quiz[$i+1];
        $xml.="  <question>".PHP_EOL;
        $xml.="    $question".PHP_EOL;
        $xml.="  </question>".PHP_EOL;
        $xml.="  <answer>".PHP_EOL;
        $xml.="    $answer".PHP_EOL;
        $xml.="  </answer>".PHP_EOL;
    }
    $xml.="</quiz>";

    return $xml;
}