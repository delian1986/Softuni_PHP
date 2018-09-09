<?php

include "Person.php";

$linesToRead=intval(fgets(STDIN));
$persons=[];

for ($i=0;$i<$linesToRead;$i++){
    list($name,$age)=explode(" ",trim(fgets(STDIN)));
    $currPerson=new Person($name,$age);
    $persons[]=$currPerson;
}

$olderThanThirty=array_filter($persons,function ($p){
   return $p->age>30;
});
usort($olderThanThirty,function ($a,$b){
    return $a->name <=>$b->name;
});


foreach ($olderThanThirty as $person){
    echo $person;
}

