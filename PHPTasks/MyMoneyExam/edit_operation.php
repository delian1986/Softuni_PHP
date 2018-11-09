<?php
require_once 'common.php';

$operationRepository= new \App\Repository\OperationRepository($db,$dataBinder);
$reasonRepository=new \App\Repository\ReasonRepository($db,$dataBinder);
$reasonService=new \App\Service\ReasonService($reasonRepository);
$operationService=new \App\Service\OperationService($operationRepository);
$operationHttpHandler=new \App\Http\OperationHttpHandler($template,$dataBinder);
$operationHttpHandler->edit($operationService,$reasonService,$userService,$_POST,$_GET);