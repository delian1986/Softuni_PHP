<?php

namespace Google;

class Person
{
    private $name;
    private $company;
    private $pokemons = [];
    private $parents = [];
    private $children = [];
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
    public function __construct(string $name, Company $company = null, Pokemon $pokemon = null, Parents $parents = null, Children $children = null, Car $car = null)
    {
        $this->name = $name;
        $this->company = $company;
        $this->pokemons = $pokemon;
        $this->parents = $parents;
        $this->children = $children;
        $this->car = $car;
    }

    function addChildren($child): array
    {
        $this->children[] = $child;
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
    public function setPokemons(Pokemon $pokemons)
    {
        $this->pokemons[] = $pokemons;
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
    public function setParents(Parents $parents)
    {
        $this->parents[] = $parents;
    }

    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param array $children
     */
    public function setChildren(Children $children): void
    {
        $this->children[] = $children;
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

    function addPokemon($pokemon): array
    {
        $this->pokemons[] = $this->$pokemon;
    }

    function addParents($parent): array
    {
        $this->parents[] = $parent;
    }

    private function getAllPokemons()
    {
        return implode(" ", $this->pokemons);
    }

    private function getAllParents() {
        return implode(" ",$this->parents);
    }

    public function __toString()
    {
        $name = $this->name;
        $company = $this->company;
        $car = $this->car;
        $pokemons = $this->pokemons;
        $parents=$this->parents;
        $children=$this->children;

        $result = "$name\n";
        $result .= "Company:\n";
        if ($company !== null) {
            $result .= $company;
        }
        $result .= "Car:\n";
        if ($car !== null) {
            $result .= $car;
        }
        $result .= "Pokemon:\n";
        if ($pokemons !== null) {
            $result .= implode("",$pokemons);
        }
        $result .= "Parents:\n";
        if ($parents !== null) {
            $result .= implode("",$parents);
        }
        $result .= "Children:\n";
        if ($children !== null) {
            $result .= implode("",$children);
        }
    return $result;
    }
}

