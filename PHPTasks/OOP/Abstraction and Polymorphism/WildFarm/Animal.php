<?php


namespace Farm;


abstract class Animal
{
    protected $name;
    protected $type;
    protected $weight;
    protected $foodEaten=0;

    public function __construct(string $name,string $type,float $weight)
    {
        $this->setName($name);
        $this->setType($type);
        $this->setWeight($weight);
    }

    /**
     * @return string
     */
    protected function getName():string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    protected function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    protected function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    protected function getWeight():float
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    protected function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    abstract function makeSound():void;
    abstract function eat(Food $food):void ;


}