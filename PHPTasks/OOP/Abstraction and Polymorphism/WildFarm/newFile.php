<?php
namespace Farm;




abstract class Animal
{
    protected $name;
    protected $type;
    protected $weight;
    protected $foodEaten=0;

    public function __construct(string $name,string $type,float $weight)
    {
        $this->setName($name);
        $this->setType($type);
        $this->setWeight($weight);
    }

    /**
     * @return string
     */
    protected function getName():string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    protected function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    protected function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    protected function getWeight():float
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    protected function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    abstract function makeSound():void;
    abstract function eat(Food $food):void ;


}


abstract class Felime extends Mammal
{
}

class Cat extends Felime
{
    protected $breed;

    public function __construct(string $name, string $type, float $weight, string $livingRegion,string $breed)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
        $this->setBreed($breed);

    }

    protected function setBreed(string $breed){
        $this->breed=$breed;
    }

    function makeSound(): void
    {
        echo "Meowwww\n";
    }

    public function eat(Food $food): void
    {
        $this->foodEaten+=$food->getQuantity();
    }

    public function __toString()
    {
        //{AnimalType} [{AnimalName}, {CatBreed}, {AnimalWeight}, {AnimalLivingRegion}, {FoodEaten}]
        return "$this->type[$this->name, $this->breed, $this->weight, $this->livingRegion, $this->foodEaten]";
    }
}









abstract class Food
{
    protected $quantity;

    public function __construct(int $quantity)
    {
        $this->setQuantity($quantity);
    }

    protected function setQuantity(int $quantity)
    {
        $this->quantity=$quantity;
    }

    public function getQuantity():float {
        return $this->quantity;
    }

}
$farm=[];
while (1) {
    $input = readline();
    if ($input == "End") {
        break;
    }
    $animalArgs = explode(" ", $input);
    $animal = null;
    $food = null;
    $animalType = $animalArgs[0];
    $animalName = $animalArgs[1];
    $animalWeight = $animalArgs[2];
    $animalLivingRegion = $animalArgs[3];
    $classType = "Farm\\" . $animalType;

    if (count($animalArgs) == 4) {
        $animal = new $classType($animalName, $animalType, $animalWeight, $animalLivingRegion);
    } else {
        $catBreed = $animalArgs[4];
        $animal = new $classType($animalName, $animalType, $animalWeight, $animalLivingRegion, $catBreed);
    }
    list($foodType, $foodQuantity) = explode(" ", readline());
    $foodType = "Farm\\" . $foodType;
    $food = new $foodType($foodQuantity);
    $animal->makeSound();
    try {
        $animal->eat($food);
    } catch (\Exception $e) {
        echo $e->getMessage().PHP_EOL;
    }
    $farm[]=$animal;
}
foreach ($farm as $currAnimal){
    echo $currAnimal;
}







class Mammal extends Animal
{
    protected $livingRegion;

    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight);
        $this->setLivingRegion($livingRegion);
    }

    function makeSound(): void
    {
        echo "Make Sound";
    }

    function eat(Food $food): void
    {
        $this->foodEaten += $food->getQuantity();
    }

    /**
     * @return string
     */
    public function getLivingRegion(): string
    {
        return $this->livingRegion;
    }

    /**
     * @param string $livingRegion
     */
    public function setLivingRegion($livingRegion): void
    {
        $this->livingRegion = $livingRegion;
    }

    public function __toString()
    {
        //Tiger[Typcho, 167.7, Asia, 0]
        return "$this->type[$this->name, $this->weight, $this->livingRegion, $this->foodEaten]";
    }

}




class Meat extends Food
{

}


class Mouse extends Mammal
{
    public function eat(Food $food): void
    {
        list($namespace, $typeOfFood) = explode("\\", get_class($food));
        if ($typeOfFood == "Vegetable") {
            $this->foodEaten += $food->getQuantity();
        } else {
            throw new \Exception("{$this->type}s are not eating that type of food!");
        }
    }

    function makeSound(): void
    {
        echo "SQUEEEAAAK!\n";
    }
}




class Tiger extends Mammal
{
    public function eat(Food $food): void
    {
        list($namespace, $typeOfFood) = explode("\\", get_class($food));
        if ($typeOfFood == "Meat") {
            $this->foodEaten += $food->getQuantity();
        } else {
            throw new \Exception("{$this->type}s are not eating that type of food!");
        }
    }

    function makeSound(): void
    {
        echo "ROAAR!!!\n";
    }
}


class Vegetable extends Food
{

}


class Zebra extends Mammal
{
    public function eat(Food $food): void
    {
        list($namespace,$typeOfFood)=explode("\\",get_class($food));
        if ($typeOfFood=="Vegetable"){
            $this->foodEaten+=$food->getQuantity();
        }else{
            throw new \Exception("$this->name are not eating that type of food!");
        }
    }
    function makeSound(): void
    {
        echo "Zs\n";
    }
}