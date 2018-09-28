<?php
//16/100
include_once "Animal.php";
include_once "Dog.php";
include_once "Cat.php";
include_once "Frog.php";
include_once "Kitten.php";
include_once "Tomcat.php";

$classes = array("Cat" => Cat::class, "Kittens" => Kittens::class, "Tomcat" => Tomcat::class, "Dog" => Dog::class, "Frog" => Frog::class);
while (1) {
    $classType = readline();
    if ($classType === "Beast!") {
        break;
    }

    try {
        $args = explode(" ", readline());
        if (!key_exists($classType, $classes)or count($args)<3) {
            throw new Exception("Invalid Input!");
        }

        $animal = new $classes[$classType]($args[0], $args[1], $args[2]);
        echo $animal;
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}

