<?php


namespace App\Service;


use App\Data\CategoryDTO;

interface CategoryServiceInterface
{
    public function getAll():\Generator;

    public function getById(int $id):CategoryDTO;
}