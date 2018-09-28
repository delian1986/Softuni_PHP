<?php


class Person
{
    public $name;
    public $age;
    public function __construct(string $name,int $age)
    {
        $this->name=$name;
        $this->age=$age;
    }
}
$person = new Person("Peter",22);
echo(count(get_object_vars($person)));
