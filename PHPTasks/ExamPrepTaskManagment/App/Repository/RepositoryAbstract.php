<?php


namespace App\Repository;


use Core\DataBinder;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class RepositoryAbstract
{
    /**
     * @var DatabaseInterface
     */
    protected $db;

    /**
     * @var DataBinderInterface
     */
    private $binder;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     * @param DataBinderInterface $dataBinder
     */
    public function __construct(DatabaseInterface $db,DataBinderInterface $dataBinder )
    {
        $this->db = $db;
        $this->binder=$dataBinder;
    }
}