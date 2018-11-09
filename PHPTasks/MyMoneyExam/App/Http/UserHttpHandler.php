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

    public function login($formData = [])
    {
        if (isset($formData['login'])) {
            $this->handleLogin($formData);
        } else {
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $this->render('users/login', $username);
            }
            $this->render('users/login');
        }
    }

    public function handleLogin($formData)
    {
        $currUser = $this->userService->login($formData['username'], $formData['password']);
        if ($currUser !== null) {
            $_SESSION['id'] = $currUser->getId();
            $this->redirect('operations.php');
        } else {
            $this->render('users/login', null, ['Username does not exists or password mismatch!']);
        }
    }

    public function profile($formData = [])
    {
        $currentUser = $this->userService->currentUser();
        if ($currentUser === null) {
            $this->redirect('login.php');
        }

        if (isset($formData['edit'])) {
            $this->handleEditProfile($formData);
        } else {
            $this->render('users/profile', $currentUser);

        }
    }

    /**
     * @param array $formData
     */
    public function handleEditProfile($formData = [])
    {
        try {
            $user = $this->dataBinder->bind($formData, UserDTO::class);
            $this->userService->edit($user);
            $this->redirect('profile.php');
        } catch (\Exception $e) {
            $currentUser = $this->userService->currentUser();
            $this->render('users/profile', $currentUser, [$e->getMessage()]);
        }
    }

    public function allUsers()
    {
        $this->render('users/all', $this->userService->allUsers());
    }

    /**
     * @param $formData
     */
    public function handleRegisterProcess($formData): void
    {
        try {
            /** @var UserDTO $user */
            $user = $this->dataBinder->bind($formData, UserDTO::class);
            $this->userService->register($user, $formData['confirm_password']);
            $_SESSION['username'] = $user->getUsername();
            $this->redirect('login.php');
        } catch (\Exception $e) {
            $this->render('users/register', null, [$e->getMessage()]);
        }
    }
}