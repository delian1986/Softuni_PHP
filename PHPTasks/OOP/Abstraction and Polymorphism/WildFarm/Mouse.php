<?php


namespace Farm;


class Mouse extends Mammal
{
    public function eat(Food $food): void
    {
        list($namespace, $typeOfFood) = explode("\\", get_class($food));
        if ($typeOfFood == "Vegetable") {
            $this->foodEaten += $food->getQuantity();
        } else {
            throw new \Exception("{$this->type}s are not eating that type of food!");
        }
    }

    function makeSound(): void
    {
        echo "SQUEEEAAAK!\n";
    }
}