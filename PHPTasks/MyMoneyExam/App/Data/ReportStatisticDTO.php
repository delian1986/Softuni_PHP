<?php


namespace App\Data;


class ReportStatisticDTO
{
    /**
     * @var UserDTO
     */
    private $user;

    /**
     * @var StatisticsDTO[]
     */
    private $statistic;

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

    /**
     * @return StatisticsDTO[]
     */
    public function getStatistic()
    {
        return $this->statistic;
    }

    /**
     * @param StatisticsDTO[] $statistic
     */
    public function setStatistic($statistic): void
    {
        $this->statistic = $statistic;
    }


}