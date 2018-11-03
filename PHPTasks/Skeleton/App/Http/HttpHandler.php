<?php


namespace App\Http;


use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class HttpHandler extends HttpHandlerAbstract
{
    public function register(UserServiceInterface $userService, $formData = [])
    {
        if (isset($formData['register'])) {
            $user = UserDTO::create(
                $formData['username'],
                $formData['password'],
                $formData['first_name'],
                $formData['last_name'],
                $formData['born_on']
            );

            if ($userService->register($user, $formData['confirm_password'])) {
                $this->redirect('login.php');
            }

        } else {
            $this->render('users/register');
        }
    }

    public function login(UserServiceInterface $userService, $formData = [])
    {

        if (isset($formData['login'])) {
            $this->handleLogin($userService, $formData);
        } else {
            $this->render('users/login');
        }
    }

    public function handleLogin(UserServiceInterface $userService, $formData)
    {
        $currUser = $userService->login($formData['username'], $formData['password']);
        if (null !== $currUser) {
            $_SESSION['id'] = $currUser->getId();
            $this->redirect('profile.php');
        }
        else{
            $this->render('users/login');
        }
    }

    public function profile(UserServiceInterface $userService, $formData = [])
    {
        $currentUser = $userService->currentUser();

        if ($currentUser === null) {
            $this->redirect('login.php');
        }

        $this->render('users/profile', $currentUser);
//        if (isset($formData['edit'])){
////            $this->render('users/profile');
//        }else{
//        }
    }

    public function handleEditProfile(UserServiceInterface $userService, $formData = [])
    {
        $currentUser = $userService->currentUser();

        if ($currentUser === null) {
            $this->redirect('login.php');
        }

        if ($userService->edit($currentUser)) {
            $this->redirect('profile.php');
        }
    }
}