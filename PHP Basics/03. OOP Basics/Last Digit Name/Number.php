<?php

namespace LastNumber;


class Number
{
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function sayLastNumber(): string
    {
        $lastDigit = $this->number % 10;
        $digitToWord = "";

        switch ($lastDigit){
            case 0:
                $digitToWord="zero";
                break;
            case 1:
                $digitToWord="one";
                break;
            case 2:
                $digitToWord="two";
                break;
            case 3:
                $digitToWord="three";
                break;
            case 4:
                $digitToWord="four";
                break;
            case 5:
                $digitToWord="five";
                break;
            case 6:
                $digitToWord="six";
                break;
            case 7:
                $digitToWord="seven";
                break;
            case 8:
                $digitToWord="eight";
                break;
            case 9:
                $digitToWord="nine";
                break;
        }
        return $digitToWord;
    }
}