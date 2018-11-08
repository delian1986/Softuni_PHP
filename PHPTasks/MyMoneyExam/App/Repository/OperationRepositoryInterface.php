<?php


namespace App\Repository;


use App\Data\OperationDTO;

interface OperationRepositoryInterface
{
    public function insert(OperationDTO $operationDTO):bool ;
}