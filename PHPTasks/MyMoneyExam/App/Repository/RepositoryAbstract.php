<?php


namespace App\Repository;


use Database\DatabaseInterface;

abstract class RepositoryAbstract
{
    /**
     * @var DatabaseInterface
     */
    protected $db;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }
}