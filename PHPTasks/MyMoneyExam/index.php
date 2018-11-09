<?php
require_once 'common.php';

$homeHttpHandler=new \App\Http\HomeHttpHandler($template,$dataBinder);
$homeHttpHandler->index();




