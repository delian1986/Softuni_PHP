<?php


namespace MooD3;
require_once "GameObject.php";

class Demon extends GameObject
{
    /**
     * @param float
     */
    private $energy;

    /**
     * Demon constructor.
     * @param string $username
     * @param string $password
     * @param float $energy
     * @param int $level
     */
    public function __construct(string $username,string $password,float $energy,int
    $level)
    {
        parent::__construct($username,$password,$level);
        $this->energy = $energy;
    }

    private function setEnergy($energy):void{
        $this->energy=$energy;
    }

    function setPassword(string $password): void
    {
        // TODO: Implement setPassword() method.
    }

}