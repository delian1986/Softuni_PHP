<?php

namespace Google;
include_once "../config.php";

class Person
{
    private $name;
    private $company;
    private $pokemons=[];
    private $parents=[];
    private $children=[];
    private $car;

    /**
     * Person constructor.
     * @param $name
     * @param $company
     * @param array $pokemons
     * @param array $parents
     * @param array $children
     * @param $car
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    function addChildren($child):array {
        $this->children[]=$child;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    /**
     * @return array
     */
    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    /**
     * @param array $pokemons
     */
    public function setPokemons(array $pokemons): void
    {
        $this->pokemons = $pokemons;
    }

    /**
     * @return array
     */
    public function getParents(): array
    {
        return $this->parents;
    }

    /**
     * @param array $parents
     */
    public function setParents(array $parents): void
    {
        $this->parents = $parents;
    }

    /**
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param array $children
     */
    public function setChildren(array $children): void
    {
        $this->children = $children;
    }

    /**
     * @return Car
     */
    public function getCar(): Car
    {
        return $this->car;
    }

    /**
     * @param Car $car
     */
    public function setCar(Car $car): void
    {
        $this->car = $car;
    }

    function addPokemon($pokemon):array {
        $this->pokemons[]=$this->$pokemon;
    }

    function addParents($parent):array {
        $this->parents[]=$parent;
    }


}