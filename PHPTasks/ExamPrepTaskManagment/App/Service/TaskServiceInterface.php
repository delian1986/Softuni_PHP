<?php


namespace App\Service;


use App\Data\TaskDTO;

interface TaskServiceInterface
{
    public function allTasks(): \Generator;

    public function insert(TaskDTO $taskDTO): bool;

    public function getOne(int $id): TaskDTO;

    public function update(TaskDTO $taskDTO, int $id): bool;

    public function remove(int $id): bool;
}