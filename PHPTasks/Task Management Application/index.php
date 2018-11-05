<?php
require_once 'common.php';
$homeHandler=new \TaskManagement\Http\HomeHttpHandler($template,$binder);
$homeHandler->index();


