<?php
require_once 'common.php';

$taskRepository=new \App\Repository\TaskRepository($db);
$taskService=new \App\Service\TaskService($taskRepository);
$taskHttpHandler= new \App\Http\TaskHttpHandler($template,$dataBinder);
$taskHttpHandler->index($taskService);




