<?php


namespace App\Http;


use App\Data\UserDTO;
use App\Service\UserServiceInterface;
use App\Http\HttpHandlerAbstract;
use Core\DataBinderInterface;
use Core\TemplateInterface;


class UserHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * UserHttpHandler constructor.
     * @param UserServiceInterface $userService
     * @param TemplateInterface $template
     * @param DataBinderInterface $dataBinder
     */
    public function __construct(UserServiceInterface $userService, TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        parent::__construct($template, $dataBinder);
        $this->userService = $userService;
    }

    public function register($formData = [])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($formData);
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
//            $this->render('app/error', new ErrorDTO('Username does not exists or password mismatch'));

        }
    }

    public function profile(UserServiceInterface $userService, $formData = [])
    {
        $currentUser = $userService->currentUser();
        if ($currentUser === null) {
            $this->redirect('login.php');
        }

        if (isset($formData['edit'])) {
            $this->handleEditProfile($userService, $formData);
        } else {
            $this->render('users/profile', $currentUser);

        }
    }

    public function handleEditProfile(UserServiceInterface $userService, $formData = [])
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);
            $this->redirect('profile.php');
    }

    public function allUsers(UserServiceInterface $userService)
    {
        $this->render('users/all', $userService->allUsers());
    }

    public function index()
    {
        $this->render('home/index');
    }

    /**
     * @param $formData
     */
    public function handleRegisterProcess($formData): void
    {
        try{
            /** @var UserDTO $user */
            $user=$this->dataBinder->bind($formData, UserDTO::class);
            $this->userService->register($user,$formData['confirm_password']);
            $_SESSION['username']=$user->getUsername();
            $this->redirect('login.php');
        }catch (\Exception $e){
//            $user=$this->dataBinder->bind($formData, UserDTO::class);
            $this->render('users/register',null,null,[$e->getMessage()]);
        }
    }
}