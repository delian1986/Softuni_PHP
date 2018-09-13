<?php

namespace Google;

include 'config.php';
class App
{
    private $persons = [];

    public function start()
    {
        $this->processInput();
    }

    private function processInput()
    {
        while (1){
            $line = $this->readLine();
            if ($line=="End"){break;}
            $args=explode(" ",$line);

            $personName = $args[0];

            if (!$this->personExist($personName)) {
                $this->persons[$personName] = new Person($personName);
            }
            $this->newClassToAdd($args);
        }
        $needlePersonName=$this->readLine();
        echo $this->persons[$needlePersonName];
    }

    private function newClassToAdd($args)
    {
        $personName = $args[0];
        $props = array_slice($args, 2);
        switch ($args[1]) {
            case "company":
                $company = new Company(...$props);
                $this->persons[$personName]->setCompany($company);
                break;
            case "pokemon":
                $pokemon=new Pokemon(...$props);
                $this->persons[$personName]->setPokemons($pokemon);
                break;
            case "parents":
                $parent=new Parents(...$props);
                $this->persons[$personName]->setParents($parent);
                break;
            case "children":
                $children=new Children(...$props);
                $this->persons[$personName]->setChildren($children);
                break;
            case "car":
                $car=new Car(...$props);
                $this->persons[$personName]->setCar($car);
                break;
        }
    }

    private function personExist($person): bool
    {
        return array_key_exists($person, $this->persons);
    }

    private function readLine()
    {
        return trim(fgets(STDIN));
    }
}
$app=new App();
$app->start();

