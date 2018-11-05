<?php
include_once 'common.php';
$homeHandler=new \TaskManagement\Http\HomeHttpHandler($template,$binder);
$taskRepo= new \TaskManagement\Repository\TaskRepository($db,$binder);
$taskService= new \TaskManagement\Service\TasksService($taskRepo);
$homeHandler->dashboard($taskService,$_GET);
