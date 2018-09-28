<?php
namespace OpinionPoll;
include_once "Person.php";

$numOfRows=intval(readline());
$people=[];

for ($i=0;$i<$numOfRows;$i++){
    list($name,$age)=explode(" ",readline());
    $person=new Person($name,$age);
    $people[]=$person;
}

$filtered=array_filter($people,function ($a){
   return $a->getAge()>30;
});

usort($filtered,function ($a,$b){
   return $a->getName() <=> $b->getName();
});

foreach ($filtered as $person){
    echo $person;
}