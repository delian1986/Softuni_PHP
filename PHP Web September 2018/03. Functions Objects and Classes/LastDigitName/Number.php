<?php


namespace Number;


class Number
{
    private $number;
    private $lastDigit;

    public function __construct($number)
    {
        $this->number = $number;
        $this->setLastDigit($number);
    }

    private function setLastDigit($number)
    {
        $last=intval(substr($number,-1));
        switch ($last){
            case 0:
                $this->lastDigit="zero";
                break;
            case 1:
                $this->lastDigit="one";
                break;
            case 2:
                $this->lastDigit="two";
                break;
            case 3:
                $this->lastDigit="three";
                break;
            case 4:
                $this->lastDigit="four";
                break;
            case 5:
                $this->lastDigit="five";
                break;
            case 6:
                $this->lastDigit="six";
                break;
            case 7:
                $this->lastDigit="seven";
                break;
            case 8:
                $this->lastDigit="eight";
                break;
            case 9:
                $this->lastDigit="nine";
                break;
        }
    }

    private function getLastDigit(){
        return $this->lastDigit;
    }

    public function __toString()
    {
        return $this->getLastDigit();
    }
}

$num=new Number(readline());
echo $num;
