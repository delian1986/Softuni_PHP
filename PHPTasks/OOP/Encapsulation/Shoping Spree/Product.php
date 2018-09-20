<?php


namespace Shop;


class Product
{
    private $name;
    private $cost;

    public function __construct($name, $cost)
    {
        $this->setName($name);
        $this->setCost($cost);
    }

    private function setName($name)
    {
        if ($name !== "") {
            $this->name = $name;
        }else{
            throw new \Exception("Name cannot be an empty\n");
        }
    }

    public function getName()
    {
        return $this->name;
    }

    private function setCost($cost)
    {
        if ($cost > 0) {
            $this->cost = $cost;
        }else{
            throw new \Exception("Cost cannot be negative\n");
        }
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function __toString()
    {
      return "$this->name";
    }

}