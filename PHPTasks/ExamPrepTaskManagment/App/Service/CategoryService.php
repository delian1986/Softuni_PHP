<?php


namespace App\Service;


use App\Data\CategoryDTO;
use App\Repository\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoryService constructor.
     * @param $categoryRepository
     */
    public function __construct($categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function getAll(): \Generator
    {
        return $this->categoryRepository->getAll();
    }

    public function getById(int $id): CategoryDTO
    {
        return $this->categoryRepository->findOne($id);
    }
}