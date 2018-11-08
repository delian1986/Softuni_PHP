<?php
require_once 'common.php';

$operationRepository= new \App\Repository\OperationRepository($db);
$reasonRepository=new \App\Repository\ReasonRepository($db);
$reasonService=new \App\Service\ReasonService($reasonRepository);
$operationService=new \App\Service\OperationService($operationRepository);
$operationHttpHandler=new \App\Http\OperationHttpHandler($template,$dataBinder);
$operationHttpHandler->create($operationService,$reasonService,$userService,$_POST);