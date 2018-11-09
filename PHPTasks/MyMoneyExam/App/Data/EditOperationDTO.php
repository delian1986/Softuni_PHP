<?php


namespace App\Data;


class EditOperationDTO
{
    /**
     * @var OperationDTO
     */
    private $operation;

    /**
     * @var ReasonDTO[]
     */
    private $reasons;

    /**
     * @return OperationDTO
     */
    public function getOperation(): OperationDTO
    {
        return $this->operation;
    }

    /**
     * @param OperationDTO $operation
     */
    public function setOperation(OperationDTO $operation): void
    {
        $this->operation = $operation;
    }

    /**
     * @return ReasonDTO[]
     */
    public function getReasons()
    {
        return $this->reasons;
    }

    /**
     * @param ReasonDTO[] $reasons
     */
    public function setReasons($reasons): void
    {
        $this->reasons = $reasons;
    }


}