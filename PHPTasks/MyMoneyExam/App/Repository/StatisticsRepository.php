<?php


namespace App\Repository;


use App\Data\StatisticsDTO;

class StatisticsRepository extends RepositoryAbstract implements StatisticsRepositoryInterface
{

    public function statistics(int $id): \Generator
    {
        $qry='SELECT 
                  name as reasons, 
                  COUNT(reason_id) as operations ,
                  SUM(`sum`) as total
              FROM reasons as r
              JOIN operations as o ON o.reason_id=r.id 
              WHERE o.user_id=?
              GROUP BY name
              ORDER BY name';

        return $this->db->query($qry)
            ->execute([$id])
            ->fetch(StatisticsDTO::class);

    }
}