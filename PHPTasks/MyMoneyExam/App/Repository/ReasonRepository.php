<?php


namespace App\Repository;


use App\Data\ReasonDTO;

class ReasonRepository extends RepositoryAbstract implements ReasonRepositoryInterface
{

    public function getAll(): \Generator
    {
       $qry='SELECT id, name FROM reasons';

       return $this->db->query($qry)
           ->execute()
           ->fetch(ReasonDTO::class);

    }

    public function getOneById(int $id): ?ReasonDTO
    {
        $qry='SELECT id, name FROM reasons WHERE id=?';

        return $this->db->query($qry)
            ->execute([$id])
            ->fetch(ReasonDTO::class)
            ->current();
    }
}