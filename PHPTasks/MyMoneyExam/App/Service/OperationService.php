<?php


namespace App\Service;


use App\Data\OperationDTO;
use App\Data\UserDTO;
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

    public function add(OperationDTO $operationDTO): int
    {
        return $this->operationRepository->insert($operationDTO);
    }


    public function getAllByUser(UserServiceInterface $userService): \Generator
    {
        /** @var UserDTO $loggedUser */
        $loggedUser=$userService->currentUser();
        return $this->operationRepository->getAllByUser(intval($loggedUser->getId()));
    }

    public function edit(OperationDTO $operationDTO): bool
    {
        $id=$operationDTO->getId();
        return $this->operationRepository->update($operationDTO,$id);
    }

    public function getOneById(int $id): OperationDTO
    {
        return $this->operationRepository->getOneById($id);
    }

    public function remove(int $id): bool
    {
        return $this->operationRepository->remove($id);
    }
}