<?php
require_once 'common.php';

$taskRepository=new \App\Repository\TaskRepository($db,$dataBinder);
$taskService=new \App\Service\TaskService($taskRepository);
$homeHttpHandler= new \App\Http\HomeHttpHandler($template,$dataBinder);
$homeHttpHandler->index($taskService);




