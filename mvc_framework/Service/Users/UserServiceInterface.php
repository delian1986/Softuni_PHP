<?php


namespace Service\Users;



use Models\BindingModels\UserRegisterBindingModel;

interface UserServiceInterface
{
    public function register(UserRegisterBindingModel $user):bool;
}