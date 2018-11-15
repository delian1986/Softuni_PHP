<?php


namespace Services\User;


use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
//    /**
//     * @var UserRepositoryInterface
//     */
//    private $userRepository;
//
//    /**
//     * UserService constructor.
//     * @param UserRepositoryInterface $userRepository
//     */
//    public function __construct(UserRepositoryInterface $userRepository)
//    {
//        $this->userRepository = $userRepository;
//    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function register($obj)
    {

        var_dump($obj);
////        if ($userDTO->getPassword() !== $confirmPassword) {
////            throw new \Exception('Passwords mismatch!');
////        }
//
//        if ($this->userRepository->findOneByUsername($userDTO->getUsername()) !== null) {
//            throw new \Exception('Username already taken!');
//        }
//
//        $this->encryptPassword($userDTO);
//
//        return $this->userRepository->insert($userDTO);
    }
//
    public function login(string $username, string $password)
    {
//        $currentUser = $this->userRepository->findOneByUsername($username);
//
//        if (null === $currentUser) {
//            return null;
//        }
//
//        $currPassHash = $currentUser->getPassword();
//        if (false === password_verify($password, $currPassHash)) {
//            return null;
//        }
//        return $currentUser;
    }
//
//
    public function currentUser()
    {
//        if (isset($_SESSION['id'])) {
//            return $this->userRepository->findOneById($_SESSION['id']);
//        } else {
//            return null;
//        }
    }
//
//    /**
//     * @param UserDTO $userDTO
//     * @return bool
//     * @throws \Exception
//     */
    public function edit($obj): bool
    {
//        $currentUser = $this->userRepository->findOneByUsername($userDTO->getUsername());
//
//        if (null !== $currentUser) {
//            throw new \Exception('User with that username is already registered!');
//        }
//
//        $this->encryptPassword($userDTO);
//
//        return $this->userRepository->update($_SESSION['id'],$userDTO);
    }
//
//    /**
//     * @param UserDTO $userDTO
//     * @throws \Exception
//     */
    public function encryptPassword($obj): void
    {
//        $plainPass = $userDTO->getPassword();
//        $passHash = password_hash($plainPass, PASSWORD_BCRYPT);
//        $userDTO->setPassword($passHash);
    }
//
//    /**
//     * @return \Generator | UserDTO[]
//     */
    public function allUsers(): \Generator
    {
//        return $this->userRepository->findAll();
    }
}