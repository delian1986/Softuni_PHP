<?php


namespace Repository\User;


use Database\DatabaseInterface;
use Models\BindingModels\UserRegisterBindingModel;

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


    public function insert(UserRegisterBindingModel $user): bool
    {
        $qry="INSERT INTO users (
                      username,
                      password
                     ) 
                VALUES
                (?, ?)";

        $this->db->query($qry)
            ->execute(
                $user->getUsername(),
                $user->getPassword()
            );

        return true;
    }


}