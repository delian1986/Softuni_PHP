<?php
require_once 'common.php';
$taskHttpHandler=new \TaskManagement\Http\TaskHttpHandler($template,$binder);
$categoryRepository=new \TaskManagement\Repository\CategoryRepository($db);
$categoryService=new \TaskManagement\Service\CategoryService($categoryRepository);
$taskHttpHandler->report($categoryService);


