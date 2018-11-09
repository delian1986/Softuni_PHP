<?php


namespace App\Service;


use App\Data\OperationDTO;

interface OperationServiceInterface
{
    public function add(OperationDTO $operationDTO):int ;

    public function getAllByUser(UserServiceInterface $userService):\Generator;

    public function edit(OperationDTO $operationDTO):bool ;

    public function getOneById(int $id):OperationDTO;

    public function remove(int $id):bool ;

}