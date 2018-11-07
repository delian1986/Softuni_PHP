<?php


namespace App\Service;


use App\Data\TaskDTO;
use App\Repository\TaskRepositoryInterface;

class TaskService implements TaskServiceInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private $taskRepository;

    /**
     * TaskService constructor.
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function allTasks(): \Generator
    {
       return $this->taskRepository->all();
    }

    public function insert(TaskDTO $taskDTO): bool
    {
        return $this->taskRepository->add($taskDTO);
    }

    public function getOne(int $id): TaskDTO
    {
        return $this->taskRepository->getCurrent($id);
    }

    public function update(TaskDTO $taskDTO, int $id): bool
    {
        return $this->taskRepository->edit($taskDTO,$id);
    }

    public function remove(int $id): bool
    {
        return $this->taskRepository->remove($id);
    }
}