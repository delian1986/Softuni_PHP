<?php


namespace App\Service;


use App\Data\OperationDTO;
use App\Repository\OperationRepositoryInterface;

class OperationService implements OperationServiceInterface
{

    /**
     * @var OperationRepositoryInterface
     */
    private $operationRepository;

    /**
     * OperationService constructor.
     * @param OperationRepositoryInterface $operationRepository
     */
    public function __construct(OperationRepositoryInterface $operationRepository)
    {
        $this->operationRepository = $operationRepository;
    }

    public function add(OperationDTO $operationDTO): bool
    {
        return $this->operationRepository->insert($operationDTO);
    }
}