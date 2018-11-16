<?php

namespace Controllers;

use Models\BindingModels\UserRegisterBindingModel;
use Models\ViewModels\UserProfileViewModel;
use Service\Users\UserServiceInterface;

class UsersController extends AbstractController
{
    public function profile(string $firstName,$lastName){
        $fullName=$firstName . ' '. $lastName;
        $model=new UserProfileViewModel($fullName);
        $this->render($model);
    }

    public function register(){
        $this->render();
    }

    public function registerProcess(UserRegisterBindingModel $bindingModel,UserServiceInterface $userService){
        $userService->register($bindingModel);
        $this->redirect('home','index',$bindingModel->getUsername());
    }

}