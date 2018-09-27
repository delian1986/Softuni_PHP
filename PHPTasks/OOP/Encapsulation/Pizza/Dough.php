<?php

namespace Pizza;

class Dough
{
    private $doughType = [];
    private $weight;
    private $calories;
    private $modifier = [
        "White"      => 1.5,
        "Wholegrain" => 1.0,
        "Crispy"     => 0.9,
        "Chewy"      => 1.1,
        "Homemade"   => 1.0
    ];

    public function __construct($doughType,$weight)
    {
        $this->setDoughType($doughType);
        $this->setWeight($weight);
    }

    private function setDoughType($doughType)
    {
        foreach ($doughType as $item) {
            $firstLetter=strtoupper($item[0]);
            $restString=substr(strtolower($item),1);
            $validatedItem=$firstLetter.$restString;

            if (array_key_exists($validatedItem, $this->modifier)) {
                $this->doughType[] = $validatedItem;
            } else {
                throw new \Exception("Invalid type of dough.\n");
            }
        }

    }

    private function setWeight($weight)
    {
        if ($weight > 0 and $weight <= 200) {
            $this->weight = $weight;
            return true;
        }
        throw new \Exception("Dough weight should be in the range [1..200].\n");
    }

    public function getCalories()
    {
        $currCalories=1;

        foreach ($this->doughType as $dough){
            $currModifier=$this->modifier[$dough];
            $currCalories*=$currModifier;
        }

        $this->calories=(2*$this->weight)*$currCalories;
        $formatted=$formatted = sprintf("%01.2f", $this->calories);
        return $formatted."\n";
    }

}