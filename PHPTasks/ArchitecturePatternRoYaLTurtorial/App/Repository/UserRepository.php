<?php


namespace App\Repository;


use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(UserDTO $user): bool
    {
        $this->db->query(
            "INSERT INTO users
                    (username, password, first_name)
                  VALUES 
                    (?,?,?)")
            ->execute([
                $user->getUsername(),
                $user->getPassword(),
                $user->getFirstName()
            ]);
        return true;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->db->query(
            "SELECT id,username,password,first_name AS firstName
                  FROM users
                    WHERE username=?")
            ->execute([$username])
            ->fetch(UserDTO::class)
            ->current();

    }


    public function findOne(int $id): ?UserDTO
    {
        return $this->db->query(
            "SELECT id,username,password,first_name AS firstName
                  FROM users
                    WHERE id=?")
            ->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function update($id, UserDTO $user): bool
    {
        $this->db->query(
            "UPDATE users
                    SET 
                    username=?,
                    password=?,
                    first_name=?
                    WHERE 
                    id=?
                    ")
            ->execute([
                $user->getUsername(),
                $user->getPassword(),
                $user->getFirstName(),
                $id
            ]);
        return true;
    }

    public function findAll(): \Generator
    {
        return $this->db->query(
            "SELECT id,username,password,first_name AS firstName
                  FROM users
                    ")
            ->execute()
            ->fetch(UserDTO::class);

    }
}