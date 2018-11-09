<?php


namespace App\Repository;


use App\Data\OperationDTO;

interface OperationRepositoryInterface
{
    public function insert(OperationDTO $operationDTO):int ;

    public function getAllByUser(int $id):\Generator;

    public function update(OperationDTO $operationDTO,int $id):bool ;

    public function getOneById(int $id):OperationDTO;

    public function remove(int $id):bool ;
}