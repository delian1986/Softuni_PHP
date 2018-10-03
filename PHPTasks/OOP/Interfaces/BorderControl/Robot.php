<?php


namespace Control;
require_once "Control.php";

class Robot implements Control
{
    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $id;

    /**
     * Robot constructor.
     * @param string $model
     * @param string $id
     */

    public function __construct(string $model, string $id)
    {
        $this->model = $model;
        $this->id = $id;
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