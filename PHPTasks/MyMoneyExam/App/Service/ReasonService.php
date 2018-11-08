<?php


namespace App\Service;


use App\Repository\ReasonRepositoryInterface;

class ReasonService implements ReasonServiceInterface
{
    /**
     * @var ReasonRepositoryInterface
     */
    private $reasonRepository;

    /**
     * ReasonService constructor.
     * @param ReasonRepositoryInterface $reasonRepository
     */
    public function __construct(ReasonRepositoryInterface $reasonRepository)
    {
        $this->reasonRepository = $reasonRepository;
    }


    public function getAll(): \Generator
    {
        return $this->reasonRepository->getAll();
    }
}