<?php


namespace App\Data;


class StatisticsDTO
{

    /**
     * @var string
     */
    private $reasons;

    /**
     * @var int
     */
    private $operations;

    /**
     * @var float
     */
    private $total;

    /**
     * @return string
     */
    public function getReasons(): string
    {
        return $this->reasons;
    }

    /**
     * @param string $reasons
     */
    public function setReasons(string $reasons): void
    {
        $this->reasons = $reasons;
    }

    /**
     * @return int
     */
    public function getOperations(): int
    {
        return $this->operations;
    }

    /**
     * @param int $operations
     */
    public function setOperations(int $operations): void
    {
        $this->operations = $operations;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }



}