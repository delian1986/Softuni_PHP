<?php


namespace Service\Users;



use Models\BindingModels\UserRegisterBindingModel;
use Repository\User\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepo
     */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepository = $userRepo;
    }


    /**
     * @param UserRegisterBindingModel $user
     * @return bool
     * @throws \Exception
     */
    public function register(UserRegisterBindingModel $user): bool
    {


        if ($user->getPassword()!==$user->getConfirmPassword()){
            throw new \Exception("Passwords mismatch!");
        }

        $plainPassword=$user->getPassword();
        $hashPassword=password_hash($plainPassword,PASSWORD_BCRYPT);
        $user->setPassword($hashPassword);

        return $this->userRepository->insert($user);
    }


}