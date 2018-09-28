<?php

class Cat extends Animal
{
    protected function produceSound(): string
    {
        return "MiauMiau\n";
    }
}