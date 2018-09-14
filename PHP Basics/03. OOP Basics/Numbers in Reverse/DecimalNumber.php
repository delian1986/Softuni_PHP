<?php

namespace Reverse;


class DecimalNumber
{
    private $number;

    public function __construct(float $number)
    {
        $this->number=$number;
    }

    public function reverseNumber():float {
        $num=strval($this->number);
        return floatval(strrev($num));
    }
}