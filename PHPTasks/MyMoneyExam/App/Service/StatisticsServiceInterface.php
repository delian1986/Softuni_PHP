<?php


namespace App\Service;



interface StatisticsServiceInterface
{
    public function getStatistics(int $userId):\Generator;
}