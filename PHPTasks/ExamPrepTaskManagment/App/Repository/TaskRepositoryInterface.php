<?php


namespace App\Repository;


use App\Data\TaskDTO;

interface TaskRepositoryInterface
{
    public function all():\Generator;
    public function add(TaskDTO $taskDTO):bool;
    public function getCurrent(int $id):TaskDTO;
}