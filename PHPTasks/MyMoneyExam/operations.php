<?php
require_once 'common.php';
$operationRepository=new \App\Repository\OperationRepository($db,$dataBinder);
$operationService=new \App\Service\OperationService($operationRepository);
$operationHttpHandler=new \App\Http\OperationHttpHandler($template,$dataBinder);
$operationHttpHandler->listAll($operationService,$userService);