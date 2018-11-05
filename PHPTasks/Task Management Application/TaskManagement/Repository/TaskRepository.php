<?php


namespace TaskManagement\Repository;


use Core\DataBinderInterface;
use Database\DatabaseInterface;
use TaskManagement\DTO\CategoryDTO;
use TaskManagement\DTO\TaskDTO;
use TaskManagement\DTO\UserDTO;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var DataBinderInterface
     */
    private $binder;

    /**
     * TaskRepository constructor.
     * @param DatabaseInterface $db
     * @param DataBinderInterface $binder
     */
    public function __construct(DatabaseInterface $db, DataBinderInterface $binder)
    {
        $this->db = $db;
        $this->binder=$binder;
    }

    public function count(): int
    {
        $qry = 'SELECT COUNT(id) as taskCount 
              FROM tasks';

        return (int)$this->db->query($qry)
            ->execute()
            ->fetchColumn();
    }

    public function findAll(int $limit = 0, int $offset = 0): \Generator
    {
        $limitClause = '';
        if ($limit > 0) {
            $limitClause = 'LIMIT ' . $limit . " OFFSET $offset";
        }

        $qry = "SELECT 
                  tasks.id as task_id,
                  title,
                  description,
                  location,
                 users.id as author_id,
                 users.username as username,
                 users.password as password,
                 users.first_name as firstName,
                 users.last_name as lastName,
                  categories.id as category_id,
                  categories.name as name,
                  started_on as startedOn,
                  due_date as dueDate
              FROM tasks
              INNER JOIN categories
                ON tasks.category_id =categories.id
                INNER JOIN users
                ON tasks.author_id = users.id
              ORDER BY 
                  due_date DESC ,
                  tasks.id ASC 
              $limitClause";


        $lazyTaskResult = $this->db->query($qry)
            ->execute()
            ->fetch();

        foreach ($lazyTaskResult as $row) {
            /**
             * @var TaskDTO $task
             * @var UserDTO $author
             * @var CategoryDTO $category
             */
            $task=$this->binder->bind($row,TaskDTO::class);
            $task->setId($row['task_id']);
            $author=$this->binder->bind($row,UserDTO::class);
            $author->setId($row['author_id']);
            $category=$this->binder->bind($row,CategoryDTO::class);
            $category->setId($row['category_id']);

            $task->setAuthor($author);
            $task->setCategory($category);

            yield $task;
        }
    }

    public function findOne(int $id): TaskDTO
    {
        $qry = 'SELECT 
                  id,
                  title,
                  description,
                  location,
                  author_id,
                  category_id,
                  started_on,
                  due_date 
              FROM tasks
              WHERE
                  id=?
              ORDER BY 
                  due_date DESC ,
                  id ASC 
              ';

        return $this->db->query($qry)
            ->execute($id)
            ->fetch(TaskDTO::class)
            ->current();
    }

    public function insert(TaskDTO $task): bool
    {
        $qry = 'INSERT INTO tasks(
                title, 
                description, 
                location, 
                author_id, 
                category_id, 
                started_on, 
                due_date
          )
          VALUES (?,?,?,?,?,?,?)';
        $this->db->query($qry)
            ->execute(
                $task->getTitle(),
                $task->getDescription(),
                $task->getLocation(),
                $task->getAuthor()->getId(),
                $task->getCategory()->getId(),
                $task->getStartedOn(),
                $task->getDueDate()
            );
        return true;
    }

    public function update(TaskDTO $task, int $id): bool
    {
        $qry = 'UPDATE tasks
               SET
               title=?,
               description=?,
               location=?,
               author_id=?,
               category_id=?,
               started_on=?,
               due_date=?,
               id=?
            WHERE
                id=?
            ';
        $this->db->query($qry)->execute(
            $task->getTitle(),
            $task->getDescription(),
            $task->getLocation(),
            $task->getAuthor()->getId(),
            $task->getCategory()->getId(),
            $task->getStartedOn(),
            $task->getDueDate(),
            $task->getId()
        );

        return true;

    }

    public function delete(int $id): bool
    {
        $qry = 'DELETE FROM tasks WHERE id=?';
        $this->db->query($qry)->execute($id);

        return true;
    }
}