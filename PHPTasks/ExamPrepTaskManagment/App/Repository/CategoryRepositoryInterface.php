<?php


namespace App\Repository;


use App\Data\CategoryDTO;

interface CategoryRepositoryInterface
{
    public function getAll():\Generator;
    public function findOne(int $id):CategoryDTO;
}