<?php

class SumTwoNums
{
    private $num1;
    private $num2;

    public function __construct($num1,$num2)
    {
        $this->num1=$num1;
        $this->num2=$num2;
    }

    public function sumNums(){
        return sprintf("%.2f",$this->num1+$this->num2);
    }

    public function __toString()
    {
        $result=$this->sumNums();
        return "\$firstNumber + \$secondNumber = $this->num1 + $this->num2 = $result";
    }
}

$num1=readline();
$num2=readline();

$sumNums=new SumTwoNums($num1,$num2);
echo $sumNums;


