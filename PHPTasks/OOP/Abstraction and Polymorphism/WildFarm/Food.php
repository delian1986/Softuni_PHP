<?php


namespace Farm;


abstract class Food
{
    protected $quantity;

    public function __construct(int $quantity)
    {
        $this->setQuantity($quantity);
    }

    protected function setQuantity(int $quantity)
    {
        $this->quantity=$quantity;
    }

    public function getQuantity():float {
        return $this->quantity;
    }

}