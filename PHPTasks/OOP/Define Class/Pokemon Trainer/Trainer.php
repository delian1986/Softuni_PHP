<?php

namespace Pokemon;
include_once "Pokemon.php";


class Trainer
{
    private $name;
    private $numberOfBadges = 0;
    private $collection = [];

    /**
     * Trainer constructor.
     * @param $name
     * @param int $numberOfBadges
     */
    public function __construct(string $name, $pokemon)
    {
        $this->name = $name;
        $this->addPokemon($pokemon);
    }

    public function addPokemon($pokemon)
    {
        $pokemonName=$pokemon->getName();
        $this->collection[$pokemonName]=$pokemon;
    }

    public function ifElementExist($element){
        foreach ($this->collection as $key=>$pokemon){
            if ($pokemon->getElement()==$element){
                return true;
            }
        }
        return false;
    }

    public function addBadge(){
        $this->numberOfBadges++;
    }

    public function getBadges(){
        return $this->numberOfBadges;
    }

    public function decreaseAllPokemonHp(){
        foreach ($this->collection as $pokemon => $value){
            $currHp=$this->collection[$pokemon]->getHealth();
            if ($currHp-10<1){
                $this->removeDeadPokemon($pokemon);
            }else{
                $newHp=$currHp-10;
                $decresedPokemon=$this->collection[$pokemon];
                $decresedPokemon->setHealth($newHp);
                $this->collection[$pokemon]=$decresedPokemon;
            }
        }
    }

    private function removeDeadPokemon($name){
        unset($this->collection[$name]);
    }

    public function getNumberOfPokemons(){
        return count($this->collection);
    }

    public function __toString()
    {
        $badges=$this->numberOfBadges;
        $pokemonsCount=$this->getNumberOfPokemons();

        return "$this->name $badges $pokemonsCount\n";
    }
}

