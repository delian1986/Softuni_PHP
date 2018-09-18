<?php


namespace Shop;


class Person
{
    private $name;
    private $money;
    private $products;

    public function __construct($name, $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->products = [];
    }

    private function setName($name)
    {
        if ($name !== "") {
            $this->name = $name;
        }else{
            throw new \Exception("Name cannot be empty\n");
        }
    }

    private function getName()
    {
        return $this->name;
    }

    private function setMoney($money)
    {
        if ($money >= 0) {
            $this->money = $money;
        }else{
            throw new \Exception("Money cannot be negative\n");
        }
    }

    private function getMoney()
    {
        return $this->money;
    }

    public function addProduct(Product $product)
    {
        $cost = $product->getCost();
        $amount = $this->getMoney();
        $name = $product->getName();

        if ($amount >= $cost) {
            $moneyLeft = $amount - $cost;
            $this->setMoney($moneyLeft);
            $this->products[] = $product;
            echo "$this->name bought $name\n";
        } else {
            echo "$this->name can't afford $name\n";
        }
    }

    public function __toString()
    {
        $personName = $this->getName();
        $prodList="";
        if (count($this->products) > 0) {
            $prodList = join(",", $this->products);
        }else{
            $prodList="Nothing bought";
        }
        return "$personName - $prodList\n";
    }

}