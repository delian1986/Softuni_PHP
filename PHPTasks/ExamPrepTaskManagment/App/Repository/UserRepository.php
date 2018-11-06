<?php


namespace App\Repository;


use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository extends RepositoryAbstract implements UserRepositoryInterface
{
    public function insert(UserDTO $userDTO): bool
    {
        $query = 'INSERT INTO users(username,password,first_name,last_name)
                VALUES (?,?,?,?)';

        $this->db->query($query)
            ->execute([
                $userDTO->getUsername(),
                $userDTO->getPassword(),
                $userDTO->getFirstName(),
                $userDTO->getLastName(),

            ]);
        return true;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        $query = 'SELECT 
                  id,
                  username,
                  password,
                  first_name as firstName,
                  last_name as lastName
                  FROM users WHERE username=?';

        return $this->db->query($query)
            ->execute([$username])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOneById(int $id): ?UserDTO
    {
        $query = 'SELECT 
                  id,
                  username,
                  password,
                  first_name as firstName,
                  last_name as lastName
                  
                  FROM users WHERE id=?';

        return $this->db->query($query)
            ->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function update(int $id, UserDTO $userDTO): bool
    {
        $query = 'UPDATE users SET username=?,password=?, first_name=?, last_name=? WHERE id=?';
        $this->db->query($query)
            ->execute([
                $userDTO->getUsername(),
                $userDTO->getPassword(),
                $userDTO->getFirstName(),
                $userDTO->getLastName(),
                $id
            ]);
        return true;
    }

    public function findAll(): \Generator
    {
        $query = 'SELECT 
                  id,
                  username,
                  password,
                  first_name as firstName,
                  last_name as lastName
                  FROM users';

        return $this->db->query($query)
            ->execute()
            ->fetch(UserDTO::class);
    }
}