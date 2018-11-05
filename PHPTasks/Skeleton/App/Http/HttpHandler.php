<?php


namespace App\Http;


use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class HttpHandler extends HttpHandlerAbstract
{
    public function register(UserServiceInterface $userService, $formData = [])
    {
        if (isset($formData['register'])) {
            $user =$this->dataBinder->bind($formData,UserDTO::class);

            if ($userService->register($user, $formData['confirm_password'])) {
                $this->redirect('login.php');
            }else{
                $this->render('app/error', new ErrorDTO('Username is already taken or password mismatch'));
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
        if ($currUser !== null) {
            $_SESSION['id'] = $currUser->getId();
            $this->redirect('profile.php');
        } else {
            $this->render('app/error', new ErrorDTO('Username does not exists or password mismatch'));

        }
    }

    public function profile(UserServiceInterface $userService, $formData = [])
    {
        $currentUser = $userService->currentUser();
        if ($currentUser === null) {
            $this->redirect('login.php');
        }

        if (isset($formData['edit'])){
            $this->handleEditProfile($userService, $formData);
        }else{
            $this->render('users/profile',$currentUser);

        }
    }

    public function handleEditProfile(UserServiceInterface $userService, $formData = [])
    {
        $user =$this->dataBinder->bind($formData,UserDTO::class);


        if($userService->edit($user)){
            $this->redirect('profile.php');
        }else{
            $this->render('app/error', new ErrorDTO('Error editing the profile'));
        }
    }

    public function allUsers(UserServiceInterface $userService){
        $this->render('users/all',$userService->allUsers());
    }

    public function index(){
        $this->render('home/index');
    }
}