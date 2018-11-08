<?php


namespace App\Service;


use App\Data\OperationDTO;

interface OperationServiceInterface
{
    public function add(OperationDTO $operationDTO):bool ;
}