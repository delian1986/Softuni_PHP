<?php


namespace Control;
require_once "Control.php";

class Citizen implements Control
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $id;

    public function __construct(string $name, int $age,string $id)
    {
        $this->name=$name;
        $this->age=$age;
        $this->id=$id;
    }

    public function validateId($id):bool
    {
        $needleLenght=strlen($id);
        if ($needleLenght==strlen($this->id)){
            return true;
        }
        return substr($this->id,-$needleLenght)==$id;
    }

    public function getId():string {
        return $this->id;
    }
}