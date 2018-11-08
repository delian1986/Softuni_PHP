<?php


namespace App\Http;


use App\Data\OperationDTO;
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
        }
    }
}