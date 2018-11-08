<?php


namespace App\Repository;


use App\Data\OperationDTO;

class OperationRepository extends RepositoryAbstract implements OperationRepositoryInterface
{

    public function insert(OperationDTO $operationDTO): bool
    {
        $qry='INSERT INTO operations(type, reason_id, sum, notes, on_date, for_date, user_id)
                  VALUES (?,?,?,?,?,?,?)';

        $this->db->query($qry)
            ->execute([
                $operationDTO->getType(),
                $operationDTO->getReason()->getId(),
                $operationDTO->getSum(),
                $operationDTO->getNotes()
            ]);
        return true;
    }
}