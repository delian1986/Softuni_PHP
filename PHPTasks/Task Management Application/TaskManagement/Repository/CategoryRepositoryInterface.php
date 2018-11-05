<?php


namespace TaskManagement\Repository;


use TaskManagement\DTO\CategoryDTO;

interface CategoryRepositoryInterface
{
    public function findAll(): \Generator;

    public function findTasksPerGroup(): \Generator;

    public function findOne(int $id):CategoryDTO;
}