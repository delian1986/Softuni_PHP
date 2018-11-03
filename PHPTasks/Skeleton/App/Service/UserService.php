<?php


namespace App\Service;


use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if ($userDTO->getPassword() !== $confirmPassword) {
            return false;
        }

        if ($this->userRepository->findOneByUsername($userDTO->getUsername()) !== null) {
            return false;
        }

        $plainPass = $userDTO->getPassword();
        $passHash = password_hash($plainPass, PASSWORD_BCRYPT);
        $userDTO->setPassword($passHash);

        return $this->userRepository->insert($userDTO);
    }

    public function login(string $username, string $password): ?UserDTO
    {
        $currentUser = $this->userRepository->findOneByUsername($username);

        if (null === $currentUser) {
            return null;
        }

        $currPassHash = $currentUser->getPassword();
        if (false === password_verify($password, $currPassHash)) {
            return null;
        }

        return $currentUser;
    }


    public function currentUser(): ?UserDTO
    {
        if (isset($_SESSION['id'])) {
            return $this->userRepository->findOneById($_SESSION['id']);
        } else {
            return null;
        }
    }

    public function edit(UserDTO $userDTO): bool
    {
        // TODO: Implement edit() method.
    }
}