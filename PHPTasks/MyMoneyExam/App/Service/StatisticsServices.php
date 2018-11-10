<?php


namespace App\Service;


use App\Repository\StatisticsRepositoryInterface;

class StatisticsServices implements StatisticsServiceInterface
{
    /**
     * @var StatisticsRepositoryInterface
     */
    private $statisticsRepository;

    /**
     * StatisticsServices constructor.
     * @param StatisticsRepositoryInterface $statisticsRepository
     */
    public function __construct(StatisticsRepositoryInterface $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }


    public function getStatistics(int $userId): \Generator
    {

        return $this->statisticsRepository->statistics($userId);
    }
}