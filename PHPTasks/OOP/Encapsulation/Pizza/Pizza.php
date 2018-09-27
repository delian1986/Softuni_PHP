<?php


namespace Pizza;


class Pizza
{
    private $name;
    private $dough = [];
    private $numOfToppings;
    private $totalCalories;

    public function __construct(string $name, int $numOfToppings)
    {
        $this->setName($name);
        $this->setToppings($numOfToppings);

    }

    private function setName($name)
    {
        if (strlen($name) < 1 and strlen($name) > 15) {
            throw new \Exception("\"Pizza name should be between 1 and 15 symbols.\n");
        } else {
            $this->name = $name;
        }
    }

    private function setToppings($toppings)
    {
        if ($toppings < 0 or $toppings > 10) {
            throw new \Exception("Number of toppings should be in range [0..10].\n");
        } else {
            $this->numOfToppings = $toppings;
        }
    }

    public function setTotalCals($total){
        $this->totalCalories=$total;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTotalCals()
    {
        $formatted = $formatted = sprintf("%01.2f", $this->totalCalories);
        return $formatted;
    }

    public function __toString()
    {
        $cals=$this->getTotalCals();
        $result="$this->name - $cals Calories.\n";
        return $result;
    }
}