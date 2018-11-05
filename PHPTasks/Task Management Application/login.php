<?php
require_once 'common.php';
$userRepo=new \TaskManagement\Repository\UserRepository($db);
$userService=new \TaskManagement\Service\UserService($userRepo);
$userHandler=new \TaskManagement\Http\UserHttpHandler($userService,$template,$binder);
$userHandler->login($_POST);

