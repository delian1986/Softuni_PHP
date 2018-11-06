<?php
require 'common.php';
$taskRepository=new \TaskManagement\Repository\TaskRepository($db,$binder);
$taskService=new \TaskManagement\Service\TasksService($taskRepository);
$taskHttpHandler=new \TaskManagement\Http\TaskHttpHandler($template,$binder);
$taskHttpHandler->delete($taskService,$_GET);
