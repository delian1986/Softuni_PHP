<?php


namespace App\Data;


class OperationDTO
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var ReasonDTO
     */
    private $reason;

    /**
     * @var float
     */
    private $sum;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var string
     */
    private $onDate;

    /**
     * @var string
     */
    private $forDate;

    /**
     * @var UserDTO
     */
    private $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return ReasonDTO
     */
    public function getReason(): ReasonDTO
    {
        return $this->reason;
    }

    /**
     * @param ReasonDTO $reason
     */
    public function setReason(ReasonDTO $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }

    /**
     * @param float $sum
     */
    public function setSum(float $sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getOnDate(): string
    {
        return $this->onDate;
    }

    /**
     * @param string $onDate
     */
    public function setOnDate(string $onDate): void
    {
        $this->onDate = $onDate;
    }

    /**
     * @return string
     */
    public function getForDate(): string
    {
        return $this->forDate;
    }

    /**
     * @param string $forDate
     */
    public function setForDate(string $forDate): void
    {
        $this->forDate = $forDate;
    }

    /**
     * @return UserDTO
     */
    public function getUser(): UserDTO
    {
        return $this->user;
    }

    /**
     * @param UserDTO $user
     */
    public function setUser(UserDTO $user): void
    {
        $this->user = $user;
    }


}