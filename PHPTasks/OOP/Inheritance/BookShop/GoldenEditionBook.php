<?php


namespace BookShop;


class GoldenEditionBook extends Book
{
    public function __construct(string $author, string $title, float $price, string $type)
    {
        parent::__construct($author, $title, $price, $type);
    }

    protected function getPrice(){
        return parent::getPrice()*1.3;
    }
}