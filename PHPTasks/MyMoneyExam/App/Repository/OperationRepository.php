<?php


namespace App\Repository;


use App\Data\OperationDTO;
use App\Data\ReasonDTO;
use App\Data\UserDTO;

class OperationRepository extends RepositoryAbstract implements OperationRepositoryInterface
{

    public function insert(OperationDTO $operationDTO): int
    {
        $qry = 'INSERT INTO operations(type, reason_id, sum, notes, for_date, user_id)
                  VALUES (?,?,?,?,?,?)';

        $this->db->query($qry)
            ->execute([
                $operationDTO->getType(),
                $operationDTO->getReason()->getId(),
                $operationDTO->getSum(),
                $operationDTO->getNotes(),
                $operationDTO->getForDate(),
                $operationDTO->getUser()->getId()
            ]);
        return intval($this->db->lastInsertId());
    }

    public function getAllByUser(int $id): \Generator
    {
        $qry = 'SELECT 
                  o.id as operationId,
                  o.type as type,
                  o.reason_id as reasonId,
                  r.name as name,
                  o.sum as sum,
                  o.notes as notes,
                  o.on_date as onDate,
                  o.for_date as forDate,
                  o.user_id as userId,
                  u.username as username,
                  u.password as password,
                  u.full_name as fullName,
                  u.born_on as bornOn
                FROM operations as o
                JOIN reasons r on o.reason_id = r.id
                JOIN users u on o.user_id = u.id
                WHERE o.user_id=?
                ORDER BY o.for_date
                ';

        $operationResult = $this->db->query($qry)
            ->execute([$id])
            ->fetch();

        foreach ($operationResult as $row) {
            /**
             * @var OperationDTO $operation
             * @var ReasonDTO $reason
             * @var UserDTO $user
             */
            $operation = $this->dataBinder->bind($row, OperationDTO::class);
            $operation->setId($row['operationId']);
            $reason = $this->dataBinder->bind($row, ReasonDTO::class);
            $reason->setId($row['reasonId']);
            $user = $this->dataBinder->bind($row, UserDTO::class);;
            $user->setId($row['userId']);
            $operation->setReason($reason);
            $operation->setUser($user);

            yield $operation;
        }

    }

    public function update(OperationDTO $operationDTO, int $id): bool
    {
        $qry = 'UPDATE operations 
                 SET
                 type=?,
                 reason_id=?,
                 sum=?,
                 notes=?,
                 for_date=?,
                 user_id=?
                 WHERE id=?';

        $this->db->query($qry)
            ->execute([
                $operationDTO->getType(),
                $operationDTO->getReason()->getId(),
                $operationDTO->getSum(),
                $operationDTO->getNotes(),
                $operationDTO->getForDate(),
                $operationDTO->getUser()->getId(),
                $id
            ]);
        return true;
    }

    public function getOneById(int $id): OperationDTO
    {
        $qry = 'SELECT 
                  o.id as operationId,
                  o.type as type,
                  o.reason_id as reasonId,
                  r.name as name,
                  o.sum as sum,
                  o.notes as notes,
                  o.on_date as onDate,
                  o.for_date as forDate,
                  o.user_id as userId,
                  u.username as username,
                  u.password as password,
                  u.full_name as fullName,
                  u.born_on as bornOn
                FROM operations as o
                JOIN reasons r on o.reason_id = r.id
                JOIN users u on o.user_id = u.id
                WHERE o.id =?
              ';

        $data = $this->db->query($qry)
            ->execute([$id])
            ->fetch()
            ->current();

        /**
         * @var OperationDTO $operation
         * @var ReasonDTO $reason
         * @var UserDTO $user
         */
        $operation = $this->dataBinder->bind($data, OperationDTO::class);
        $operation->setId($data['operationId']);
        $reason = $this->dataBinder->bind($data, ReasonDTO::class);
        $reason->setId($data['reasonId']);
        $user = $this->dataBinder->bind($data, UserDTO::class);;
        $user->setId($data['userId']);
        $operation->setReason($reason);
        $operation->setUser($user);

        return $operation;
    }

    public function remove(int $id): bool
    {
        $qry='DELETE FROM operations WHERE id=?';
        $this->db->query($qry)->execute([$id]);

        return true;
    }
}