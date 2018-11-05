<?php


namespace TaskManagement\Repository;


use Database\DatabaseInterface;
use TaskManagement\DTO\UserDTO;

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



    public function findOneByUsername(string $username): ?UserDTO
    {
        $qry = "SELECT 
                      id, 
                      username,
                      password,
                      first_name as firstName,
                      last_name as lastName 
                FROM users
                WHERE username=?";

        return $this->db->query($qry)
            ->execute($username)
            ->fetch(UserDTO::class)
            ->current();
    }

    public function insert(UserDTO $user): bool
    {
        $qry="INSERT INTO users (
                      username,
                      password,
                      first_name,
                      last_name ) 
                VALUES
                (?, ?, ?, ?)";
        $this->db->query($qry)
            ->execute(
                $user->getUsername(),
                $user->getPassword(),
                $user->getFirstName(),
                $user->getLastName()
            );

        return true;
    }


}