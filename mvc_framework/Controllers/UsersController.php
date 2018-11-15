<?php

namespace Controllers;


use Models\ViewModels\UserRegisterViewModel;
use Services\User\UserServiceInterface;

class UsersController extends AbstractController
{
    public function test()
    {
        echo 'test';
    }

    public function register(int $id,UserServiceInterface $userService)
    {
        var_dump($id);
        $userService->register(['sad']);
    }
}

