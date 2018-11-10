<?php


namespace App\Repository;


interface StatisticsRepositoryInterface
{
    public function statistics(int $id):\Generator;
}