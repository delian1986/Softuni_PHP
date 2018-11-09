<?php


namespace App\Data;


class OperationDTO
{
    private CONST TYPE_LENGTH=1;

    private CONST SUM_MIN_VALUE=0;
    private CONST SUM_MAX_VALUE=99999.99;

    private CONST NOTE_MIN_LENGTH=0;
    private CONST NOTE_MAX_LENGTH=255;

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
     * @throws \Exception
     */
    public function setType(string $type): void
    {
        DtoValidator::validate(self::TYPE_LENGTH,self::TYPE_LENGTH,$type,'text','Type');
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
     * @throws \Exception
     */
    public function setSum(float $sum): void
    {
        DtoValidator::validate(self::SUM_MIN_VALUE,self::SUM_MAX_VALUE,$sum,'number','Sum');
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
     * @throws \Exception
     */
    public function setNotes(string $notes): void
    {
        DtoValidator::validate(self::NOTE_MIN_LENGTH,self::NOTE_MAX_LENGTH,$notes,'text','Note');
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