<?php
//80/100

namespace Shop;
include_once "Person.php";
include_once "Product.php";

class App
{
    private $listOfProducts = [];
    private $listOfPeople = [];
    private $isException = false;

    public function start()
    {
        $this->processInput();
    }

    private function processInput()
    {
        $people = explode(";", trim(readline()));
        if (!$this->isException) {
            foreach ($people as $person) {
                if ($person !== "") {
                    list($name, $money) = explode("=", $person);
                    try {
                        $person = new Person($name, $money);
                        $this->addPerson($name, $person);
                    } catch (\Exception $e) {
                        $this->isException = true;
                        echo $e->getMessage();
                    }
                }
            }
        }

        $products = explode(";", readline());
        if (!$this->isException) {
            foreach ($products as $product) {
                if ($product !== "") {
                    list($name, $cost) = explode("=", $product);
                    try {
                        $item = new Product($name, $cost);
                        $this->addProduct($name, $item);
                    } catch (\Exception $e) {
                        $this->isException = true;
                        echo $e->getMessage();
                    }
                }

            }
        }

        if (!$this->isException) {
            while (1) {
                $line = readline();
                if ($line == "END") {
                    break;
                }
                list($name, $productName) = explode(" ", $line);
                $currPerson = $this->listOfPeople[$name];
                $currProduct = $this->listOfProducts[$productName];
                $currPerson->addProduct($currProduct);
            }
            $this->printOutput();
        }
    }

    private function printOutput()
    {
        foreach ($this->listOfPeople as $person) {
            echo $person;
        }
    }

    private function addProduct($name, Product $product)
    {
        $this->listOfProducts[$name] = $product;
    }

    private function addPerson($name, Person $person)
    {
        $this->listOfPeople[$name] = $person;
    }
}

$app = new App();
$app->start();