<?php


namespace Repository\User;



use Models\BindingModels\UserRegisterBindingModel;

interface UserRepositoryInterface
{
    public function insert(UserRegisterBindingModel $user):bool ;
}