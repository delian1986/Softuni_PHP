<?php


namespace Farm;


class Zebra extends Mammal
{
    public function eat(Food $food): void
    {
        list($namespace,$typeOfFood)=explode("\\",get_class($food));
        if ($typeOfFood=="Vegetable"){
            $this->foodEaten+=$food->getQuantity();
        }else{
            throw new \Exception("$this->name are not eating that type of food!");
        }
    }
    function makeSound(): void
    {
        echo "Zs\n";
    }
}