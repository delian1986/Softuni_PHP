<?php


namespace App\Repository;


use App\Data\CategoryDTO;
use App\Data\TaskDTO;
use App\Data\UserDTO;

class TaskRepository extends RepositoryAbstract implements TaskRepositoryInterface
{

    /**
     * @return \Generator
     */
    public function all(): \Generator
    {
        $query = 'SELECT
                    t.id AS task_id,
                    t.title AS title,
                    t.description AS description,
                    t.location AS location,
                    t.started_on AS startedOn,
                    t.due_date AS dueDate,
                    c.id AS cat_id,
                    c.name AS name,
                    u.id AS user_id,
                    u.username AS username,
                    u.password AS password,
                    u.first_name AS firstName,
                    u.last_name AS lastName
                  FROM tasks AS t
                  JOIN users u ON t.author_id = u.id
                  JOIN categories c ON t.category_id = c.id
                  ORDER BY dueDate DESC , t.id';

        $data = $this->db->query($query)
            ->execute()
            ->fetch();

        foreach ($data as $row) {
            /**
             * @var TaskDTO $task
             * @var UserDTO $author
             * @var CategoryDTO $category
             */
            $author = $this->binder->bind($row, UserDTO::class);
            $author->setId($row['user_id']);

            $task = $this->binder->bind($row, TaskDTO::class);
            $task->setId($row['task_id']);

            $category = $this->binder->bind($row, CategoryDTO::class);
            $category->setId($row['cat_id']);

            $task->setAuthor($author);
            $task->setCategory($category);
            yield $task;
        }
    }

    public function add(TaskDTO $taskDTO): bool
    {
        $qry = 'INSERT INTO 
                    tasks
                    (title, description, location, author_id, category_id, started_on, due_date)
              VALUES (?,?,?,?,?,?,?)';
        $this->db->query($qry)
            ->execute([
                $taskDTO->getTitle(),
                $taskDTO->getDescription(),
                $taskDTO->getLocation(),
                $taskDTO->getAuthor()->getId(),
                $taskDTO->getCategory()->getId(),
                $taskDTO->getStartedOn(),
                $taskDTO->getDueDate()
            ]);
        return true;
    }

    public function getCurrent(int $id): TaskDTO
    {
        $query = 'SELECT
                    t.id AS task_id,
                    t.title AS title,
                    t.description AS description,
                    t.location AS location,
                    t.started_on AS startedOn,
                    t.due_date AS dueDate,
                    c.id AS cat_id,
                    c.name AS name,
                    u.id AS user_id,
                    u.username AS username,
                    u.password AS password,
                    u.first_name AS firstName,
                    u.last_name AS lastName
                  FROM tasks AS t
                  JOIN users u ON t.author_id = u.id
                  JOIN categories c ON t.category_id = c.id
                  WHERE t.id=?';

        $data = $this->db->query($query)
            ->execute([$id])
            ->fetch();

        /**
         * @var TaskDTO $task
         * @var UserDTO $author
         * @var CategoryDTO $category
         */
        $author = $this->binder->bind($data, UserDTO::class);
        $author->setId($data['user_id']);

        $task = $this->binder->bind($data, TaskDTO::class);
        $task->setId($data['task_id']);

        $category = $this->binder->bind($data, CategoryDTO::class);
        $category->setId($data['cat_id']);

        $task->setAuthor($author);
        $task->setCategory($category);
        return $task;
    }
}