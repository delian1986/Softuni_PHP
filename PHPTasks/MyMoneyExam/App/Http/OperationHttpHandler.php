<?php


namespace App\Http;


use App\Data\EditOperationDTO;
use App\Data\OperationDTO;
use App\Data\ReasonDTO;
use App\Data\UserDTO;
use App\Service\OperationServiceInterface;
use App\Service\ReasonServiceInterface;
use App\Service\UserServiceInterface;

class OperationHttpHandler extends HttpHandlerAbstract
{
    public function create(OperationServiceInterface $operationService,ReasonServiceInterface $reasonService,UserServiceInterface $userService,$postData=[]){
        if(!isset($_SESSION['id'])){
            $this->redirect('index.php');
        }

        if (!isset($postData['save'])){
            $reasons=$reasonService->getAll();
            $this->render('operations/add',$reasons);
        }else{
            $this->handleCreateOperationProcess($operationService,$reasonService,$userService,$postData);
        }
    }

    private function handleCreateOperationProcess(OperationServiceInterface $operationService, ReasonServiceInterface $reasonService, UserServiceInterface $userService, $postData)
    {
        try{
            /**
             * @var ReasonDTO $reason
             * @var UserDTO $user
             * @var OperationDTO $operation
             */
            $reason=$reasonService->getOneById($postData['reason_id']);
            $user= $userService->currentUser();
            $operation=$this->dataBinder->bind($postData,OperationDTO::class);
            $operation->setReason($reason);
            $operation->setUser($user);
            $id=$operationService->add($operation);
            $this->redirect("operations.php?highlight_id=$id");
        }catch (\Exception $e){
            $reasons= $reasonService->getAll();
            $this->render('operations/add',$reasons,[$e->getMessage()]);
        }
    }

    public function listAll(OperationServiceInterface $operationService,UserServiceInterface $userService){
        $operations=$operationService->getAllByUser($userService);

        $this->render('operations/all',$operations);
    }


    /**
     * @param OperationServiceInterface $operationService
     * @param ReasonServiceInterface $reasonService
     * @param UserServiceInterface $userService
     * @param array $postData
     * @param array $getData
     */
    public function edit(OperationServiceInterface $operationService, ReasonServiceInterface $reasonService, UserServiceInterface $userService, array $postData=[], array $getData=[]){
        if(!isset($_SESSION['id'])){
            $this->redirect('index.php');
        }

        if (!isset($postData['save'])){
            $operation=$operationService->getOneById($getData['id']);
            $editOperationDto=new EditOperationDTO();
            $editOperationDto->setOperation($operation);
            $editOperationDto->setReasons($reasonService->getAll());
            $this->render('operations/edit',$editOperationDto);
        }else{
            $this->handleEditOperationProcess($operationService,$reasonService,$userService,$postData,$getData);        }

    }

    private function handleEditOperationProcess(OperationServiceInterface $operationService, ReasonServiceInterface $reasonService, UserServiceInterface $userService, array $postData,array $getData)
    {
        try{
            /**
             * @var ReasonDTO $reason
             * @var UserDTO $user
             * @var OperationDTO $operation
             */
            $reason=$reasonService->getOneById($postData['reason_id']);
            $user= $userService->currentUser();
            $operation=$this->dataBinder->bind($postData,OperationDTO::class);
            $operation->setReason($reason);
            $operation->setUser($user);
            $operation->setId($getData['id']);
            $operationService->edit($operation);
            $id=$getData['id'];
            $this->redirect("operations.php?highlight_id=$id");
        }catch (\Exception $e){
            $operation=$operationService->getOneById($getData['id']);
            $editOperationDto=new EditOperationDTO();
            $editOperationDto->setOperation($operation);
            $editOperationDto->setReasons($reasonService->getAll());
            $this->render('operations/edit',$editOperationDto,[$e->getMessage()]);
        }
    }

    public function remove(OperationServiceInterface $operationService,array $getData){
        $operationService->remove($getData['id']);
        $this->redirect('operations.php');
    }
}