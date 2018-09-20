<?php

namespace Oldest;

class Family
{
    private $family;

    public function __construct()
    {
        $this->family=[];
    }

    public function addMember(Person $person){
        $this->family[]=$person;
    }

    public function getOldest():Person{
        usort($this->family,function ($a,$b){
           return $b->getAge() <=> $a->getAge();
        });
        return $this->family[0];
    }
}