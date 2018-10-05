<?php
namespace Farm;
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
