<?php

namespace Google;
include "./config.php";

class App
{
    private $persons = [];

    public function start()
    {
        $this->processInput();
    }

    private function processInput()
    {
        $args = explode(" ", $this->readLine());
        $personName = $args[0];
        $class = $args[1];

        if (!$this->personExist($personName)) {
            $this->persons[] = new Person($personName);
        }
        $this->newClassToAdd($args);
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


