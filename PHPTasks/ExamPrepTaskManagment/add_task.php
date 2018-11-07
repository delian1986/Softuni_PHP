<?php
require_once 'common.php';

$categoryRepository= new \App\Repository\CategoryRepository($db,$dataBinder);
$categoryService=new \App\Service\CategoryService($categoryRepository);
$userRepository=new \App\Repository\UserRepository($db,$dataBinder);
$userService=new \App\Service\UserService($userRepository);
$taskRepository=new \App\Repository\TaskRepository($db,$dataBinder);
$taskService=new \App\Service\TaskService($taskRepository);
$taskHttpHandler= new \App\Http\TaskHttpHandler($template,$dataBinder);
$taskHttpHandler->addTask($taskService,$categoryService,$userService,$_POST);

