<?php


namespace Decimal;


class DecimalNumber
{
    private $number;
    private $reversed;

    public function __construct($number)
    {
        $this->number=$number;
        $this->setReverseNumber($number);
    }

    private function setReverseNumber($number){
        $this->reversed=strrev($number);
    }

    public function __toString()
    {
        return $this->reversed;
    }
}

$number=new DecimalNumber(readline());
echo $number;