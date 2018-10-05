<?php


namespace Farm;


class Mammal extends Animal
{
    protected $livingRegion;

    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight);
        $this->setLivingRegion($livingRegion);
    }

    function makeSound(): void
    {
        echo "Make Sound";
    }

    function eat(Food $food): void
    {
        $this->foodEaten += $food->getQuantity();
    }

    /**
     * @return string
     */
    public function getLivingRegion(): string
    {
        return $this->livingRegion;
    }

    /**
     * @param string $livingRegion
     */
    public function setLivingRegion($livingRegion): void
    {
        $this->livingRegion = $livingRegion;
    }

    public function __toString()
    {
        //Tiger[Typcho, 167.7, Asia, 0]
        return "$this->type[$this->name, $this->weight, $this->livingRegion, $this->foodEaten]";
    }

}