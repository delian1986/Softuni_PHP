<?php


namespace App\Repository;


use Core\DataBinder;
use Database\DatabaseInterface;

abstract class RepositoryAbstract
{
    /**
     * @var DatabaseInterface
     */
    protected $db;

    /**
     * @var DataBinder
     */
    protected $dataBinder;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     * @param DataBinder $dataBinder
     */
    public function __construct(DatabaseInterface $db, DataBinder $dataBinder)
    {
        $this->db = $db;
        $this->dataBinder=$dataBinder;
    }
}