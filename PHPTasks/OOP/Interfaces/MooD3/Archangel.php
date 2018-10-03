<?php


namespace MooD3;
require_once "GameObject.php";

class Archangel extends GameObject
{
    /**
     * @var int
     */
    private $mana;

    /**
     * Archangel constructor.
     * @param string $username
     * @param string $password
     * @param int $level
     * @param int $mana
     */
    public function __construct(string $username, string $password, int $mana, int $level)
    {
        parent::__construct($username, $password, $level);
        $this->setMana($mana);
    }

    private function setMana($mana): void
    {
        $this->mana = $mana;
    }

    function setPassword(string $password): void
    {
        // TODO: Implement setPassword() method.
    }

}