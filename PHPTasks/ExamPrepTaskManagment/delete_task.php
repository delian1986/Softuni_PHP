<?php
require_once 'common.php';

$taskRepository= new \App\Repository\TaskRepository($db,$dataBinder);
$taskService=new \App\Service\TaskService($taskRepository);
$taskHttpHandler=new \App\Http\TaskHttpHandler($template,$dataBinder);
$taskHttpHandler->remove($taskService,$_GET);

