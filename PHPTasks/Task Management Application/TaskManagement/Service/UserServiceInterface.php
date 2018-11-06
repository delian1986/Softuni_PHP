<?php


namespace TaskManagement\Service;


use TaskManagement\DTO\UserDTO;

interface UserServiceInterface
{
    public function login($username,$password):bool ;

    public function register(UserDTO $user,string $confirmPassword):bool;

    public function getCurrentUser():UserDTO;
}