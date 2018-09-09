<?php
// 80/100
namespace Pokemon;
include "Trainer.php";

$trainers = [];

while (1) {
    $line = trim(fgets(STDIN));
    if ($line == "Tournament") {
        break;
    }
    $args = explode(" ", $line);

    $trainerName = $args[0];
    $pokemonName = $args[1];
    $element = null;
    $health = null;

    if (count($args) == 4) {
        $element = $args[2];
        $health = $args[3];
    } else if (count($args) == 3) {
        $optimal = $args[2];
        if (is_numeric($optimal)) {
            $health = $optimal;
        } else {
            $element = $optimal;
        }
    }
    $pokemon = new Pokemon($pokemonName, $element, $health);
    if (!array_key_exists($trainerName, $trainers)) {
        $trainer = new Trainer($trainerName, $pokemon);
        $trainers[$trainerName] = $trainer;
    }else{
        $trainers[$trainerName]->addPokemon($pokemon);
    }
}

while (1) {
    $element = trim(fgets(STDIN));
    if ($element == "End") {
        break;
    }

    foreach ($trainers as $name => $value) {
        if ($trainers[$name]->ifElementExist($element)) {
            $trainers[$name]->addBadge();
        } else {
            $trainers[$name]->decreaseAllPokemonHp();
        }
    }
}

usort($trainers, function ($a, $b) {
    if ($a->getBadges() - $b->getBadges() != 0) {
        return $b->getBadges() <=> $a->getBadges();
    } else {
        return $a->getNumberOfPokemons() <=> $b->getNumberOfPokemons();
    }
});

foreach ($trainers as $trainer){
    echo $trainer;
}

