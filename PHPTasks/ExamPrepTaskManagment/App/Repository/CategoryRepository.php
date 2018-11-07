<?php


namespace App\Repository;


use App\Data\CategoryDTO;

class CategoryRepository extends RepositoryAbstract implements CategoryRepositoryInterface
{

    public function getAll(): \Generator
    {
        $qry='SELECT 
                 id, name
              FROM categories';

        return $this->db->query($qry)
            ->execute()
            ->fetch(CategoryDTO::class);
    }

    public function findOne(int $id): CategoryDTO
    {
        $qry='SELECT 
                 id, name
              FROM categories
              WHERE id=?';

        return $this->db->query($qry)
            ->execute([$id])
            ->fetch(CategoryDTO::class)
            ->current();
    }
}