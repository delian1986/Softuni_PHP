<?php


namespace App\Repository;


use App\Data\TaskDTO;

class TaskRepository extends RepositoryAbstract implements TaskRepositoryInterface
{

    public function all(): \Generator
    {
        $query = 'SELECT 
                  id,
                  title,
                  category_id,
                  author_id 
                  FROM tasks';

        return $this->db->query($query)
            ->execute()
            ->fetch(TaskDTO::class);
    }
}