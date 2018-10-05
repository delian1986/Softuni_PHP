<?php


namespace Farm;


class Cat extends Felime
{
    protected $breed;

    public function __construct(string $name, string $type, float $weight, string $livingRegion,string $breed)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
        $this->setBreed($breed);

    }

    protected function setBreed(string $breed){
        $this->breed=$breed;
    }

    function makeSound(): void
    {
        echo "Meowwww\n";
    }

    public function eat(Food $food): void
    {
        $this->foodEaten+=$food->getQuantity();
    }

    public function __toString()
    {
        //{AnimalType} [{AnimalName}, {CatBreed}, {AnimalWeight}, {AnimalLivingRegion}, {FoodEaten}]
        return "$this->type[$this->name, $this->breed, $this->weight, $this->livingRegion, $this->foodEaten]";
    }
}