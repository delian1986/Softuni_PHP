<?php
/**
 * Created by PhpStorm.
 * User: Delyan
 * Date: 1.11.2018 г.
 * Time: 11:20
 */

namespace Database;


class PDODatabase implements DatabaseInterface
{
    /**
     * @var /PDO
     */
    private $pdo;

    /**
     * PDODatabase constructor.
     * @param $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function query(string $query): StatementInterface
    {
        $stmt=$this->pdo->prepare($query);
        return new PDOPreparedStatement($stmt);
    }
}