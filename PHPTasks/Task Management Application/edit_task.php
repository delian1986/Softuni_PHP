<?php
require 'common.php';
$categoryRepository=new \TaskManagement\Repository\CategoryRepository($db);
$userService=new \TaskManagement\Service\UserService(new \TaskManagement\Repository\UserRepository($db));
$categoryService=new \TaskManagement\Service\CategoryService($categoryRepository);
$taskRepository=new \TaskManagement\Repository\TaskRepository($db,$binder);
$taskService=new \TaskManagement\Service\TasksService($taskRepository);
$taskHttpHandler=new \TaskManagement\Http\TaskHttpHandler($template,$binder);
$taskHttpHandler->edit($taskService,$categoryService,$userService,$_POST,$_GET);
