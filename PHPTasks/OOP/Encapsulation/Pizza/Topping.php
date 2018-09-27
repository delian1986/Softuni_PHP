<?php


namespace Pizza;


class Topping
{
    private $type;  //meat, veggies, cheese or a sauce
    private $weight;
    private $calories;
    private $modifier=[
        "Meat"    => 1.2,
        "Veggies" => 0.8,
        "Cheese"  => 1.1,
        "Sauce"   => 0.9
    ];

    public function __construct(string $type,$weight)
    {
        $this->setType($type);
        $this->setWeight($weight);
    }

    private function setType($type){
        $firstLetter=strtoupper($type[0]);
        $restString=substr(strtolower($type),1);
        $validatedType=$firstLetter.$restString;
        if (isset($this->modifier[$validatedType])){
            $this->type=$validatedType;
        }else{
            throw new \Exception("Cannot place $type on top of your pizza.\n");
        }
    }

    private function setWeight($weight){
        if ($weight>0 and $weight <51){
            $this->weight=$weight;
        }else{
            throw new \Exception("$this->type weight should be in the range [1..50].\n");
        }
    }

    public function getCalories()
    {
        $currCalories=2*$this->modifier[$this->type];

        $this->calories=$this->weight*$currCalories;
        $formatted=$formatted = sprintf("%01.2f", $this->calories);
        return $formatted."\n";
    }
}