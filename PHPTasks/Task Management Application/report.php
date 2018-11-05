<?php
require_once 'common.php';
$taskHttpHandler=new \TaskManagement\Http\TaskHttpHandler($template,$binder);
$categoryService=new \TaskManagement\Service\CategoryService();
$taskHttpHandler->report($categoryService);


