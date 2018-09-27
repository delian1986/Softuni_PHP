<?php

namespace BookShop;

class Book
{
    protected $title;
    protected $author;
    protected $price;
    protected $type;

    public function __construct(string $author,string $title, float $price, string $type)
    {
        $this->setAuthor($author);
        $this->setTitle($title);
        $this->setPrice($price);
        $this->setType($type);
    }

    protected function setType($type)
    {
        if ($type !== "STANDARD" and $type !== "GOLD") {
            throw new \Exception("Type is not valid!\n");
        }
        $this->type = $type;
    }

    protected function setPrice($price)
    {
        if ($price < 1) {
            throw new \Exception("Price not valid!\n");
        }
        $this->price = $price;

    }

    protected function setTitle($title)
    {
        if (strlen($title) < 3) {
            throw new \Exception("Title not valid!\n");

        }
    }

    protected function setAuthor($author)
    {
        $name = explode(" ", $author);

        if (isset($name[1])) {
            $firstChar = $name[1][0];
            if (is_numeric($firstChar)) {
                throw new \Exception("Author not valid!\n");
            }
            $this->author = $author;
        }
    }

    protected function getPrice(){
        return $this->price;
    }

    public function __toString()
    {

        $result="OK\n";
        $result.=$this->getPrice().PHP_EOL;
        return $result;
    }
}