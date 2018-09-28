<?php


class Person
{
    public $name;
    public $age;
    public $occupation;

    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function __toString()
    {
        return "$this->name - age: $this->age, occupation: $this->occupation\n";
    }
}

$people=[];
while (1) {
    $line = readline();
    if ($line == "END"){break;}
    list($name, $age, $occupation) = explode(" ", $line);
    $person = new Person($name, $age, $occupation);
    $people[]=$person;
}

usort($people,function ($a,$b){
   return $a->age <=> $b->age;
});

foreach ($people as $person){
    echo $person;
}
