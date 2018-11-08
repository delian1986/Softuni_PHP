<?php


namespace Database;


class PDOResultSet implements ResultSetInterface
{
    /**
     * @var \PDOStatement
     */
    private $pdoStatement;

    /**
     * PDOPreparedStatement constructor.
     * @param \PDOStatement $pdoStatement
     */
    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    /**
     * @param $className
     * @return \Generator
     */
    public function fetch($className = null): \Generator
    {
        if (null === $className) {
            while ($row = $this->pdoStatement->fetch(\PDO::FETCH_ASSOC)) {
                yield $row;
            }
        } else {
            while ($row = $this->pdoStatement->fetchObject($className)) {
                yield $row;
            }
        }

    }

    public function fetchColumn(int $columnNum = 0)
    {
        return $this->pdoStatement->fetchColumn($columnNum);
    }
}