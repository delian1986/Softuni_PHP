<?php


namespace Farm;


class Tiger extends Mammal
{
    public function eat(Food $food): void
    {
        list($namespace, $typeOfFood) = explode("\\", get_class($food));
        if ($typeOfFood == "Meat") {
            $this->foodEaten += $food->getQuantity();
        } else {
            throw new \Exception("{$this->type}s are not eating that type of food!");
        }
    }

    function makeSound(): void
    {
        echo "ROAAR!!!\n";
    }
}