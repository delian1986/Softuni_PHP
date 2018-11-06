<?php


namespace TaskManagement\Service;


use TaskManagement\DTO\UserDTO;
use TaskManagement\Repository\UserRepositoryInterface;

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

    public function login($username, $password): bool
    {
        $user=$this->userRepository->findOneByUsername($username);

        if ($user===null){
            throw new \Exception("Username not found!");
        }

        $passwordHash=$user->getPassword();

        if (!password_verify($password,$passwordHash)){
            throw new \Exception("Username or password are invalid");
        }

        $_SESSION['id']=$user->getId();

        return true;
    }

    /**
     * @param UserDTO $user
     * @param string $confirmPassword
     * @return bool
     * @throws \Exception
     */
    public function register(UserDTO $user, string $confirmPassword): bool
    {


        if ($user->getPassword()!==$confirmPassword){
            throw new \Exception("Passwords mismatch!");
        }

        $userFromDb=$this->userRepository->findOneByUsername($user->getUsername());

        if (null!==$userFromDb){
            throw new \Exception("Username is taken!");
        }

        $plainPassword=$user->getPassword();
        $hashPassword=password_hash($plainPassword,PASSWORD_BCRYPT);
        $user->setPassword($hashPassword);

        return $this->userRepository->insert($user);
    }

    /**
     * @return UserDTO
     * @throws \Exception
     */
    public function getCurrentUser(): UserDTO
    {
        if (!isset($_SESSION['id'])){
            throw new \Exception('No current user!');
        }
        return $this->userRepository->findOneById(intval($_SESSION['id']));
    }
}