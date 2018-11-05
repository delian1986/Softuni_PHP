<?php


namespace TaskManagement\Repository;


use Database\DatabaseInterface;
use TaskManagement\DTO\CategoryDTO;
use TaskManagement\DTO\TaskDTO;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * TaskRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function findAll(): \Generator
    {
        $qry = "SELECT 
                id,
                name
            FROM categories
            ORDER BY name";

        return $this->db
            ->query($qry)
            ->execute()
            ->fetch(CategoryDTO::class);
    }

    public function findTasksPerGroup(): \Generator
    {
        $qry = "SELECT 
                   categories.id,
                   name,
                   COUNT(tasks.id) as taskCount
                   FROM categories
                INNER JOIN tasks
                ON categories.id = tasks.category_id
                GROUP BY categories.id
                ORDER BY 
                          taskCount DESC,
                          categories.name 
                ";

        return $this->db->query($qry)->execute()->fetch(CategoryDTO::class);
    }

    public function findOne(int $id): CategoryDTO
    {
        $query = "SELECT id, name FROM categories WHERE id = ?";

        return $this->db->query($query)
            ->execute($id)
            ->fetch(CategoryDTO::class)
            ->current();
    }
}