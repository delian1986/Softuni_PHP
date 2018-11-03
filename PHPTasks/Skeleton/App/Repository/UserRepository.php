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


    public function insert(UserDTO $userDTO): bool
    {
        $query = 'INSERT INTO skeleton.users(username,password,first_name,last_name,born_on)
                VALUES (?,?,?,?,?)';

        $this->db->query($query)
            ->execute([
                $userDTO->getUsername(),
                $userDTO->getPassword(),
                $userDTO->getFirstName(),
                $userDTO->getLastName(),
                $userDTO->getBornOn()
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
                  last_name as lastName,
                  born_on as bornOn
                  FROM skeleton.users WHERE username=?';

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
                  last_name as lastName,
                  born_on as bornOn
                  FROM skeleton.users WHERE username=?';

        return $this->db->query($query)
            ->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function update(int $id, UserDTO $userDTO): bool
    {
        $query = 'UPDATE skeleton.users SET username=?,password=?, first_name=?, last_name=?,born_on=? WHERE id=?';
        $this->db->query($query)
            ->execute([
                $userDTO->getUsername(),
                $userDTO->getPassword(),
                $userDTO->getFirstName(),
                $userDTO->getLastName(),
                $userDTO->getBornOn(),
                $id
            ]);
        return true;
    }
}