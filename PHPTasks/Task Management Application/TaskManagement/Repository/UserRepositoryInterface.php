<?php


namespace TaskManagement\Repository;


use TaskManagement\DTO\UserDTO;

interface UserRepositoryInterface
{
    public function findOneByUsername(string $username):?UserDTO;

    public function insert(UserDTO $user):bool ;

    public function findOneById(int $id):UserDTO;
}