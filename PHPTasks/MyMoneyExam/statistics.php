<?php
require_once 'common.php';
$statisticsRepository= new \App\Repository\StatisticsRepository($db,$dataBinder);
$statisticService=new \App\Service\StatisticsServices($statisticsRepository);
$statisticsHttpHandler=new \App\Http\StatisticsHttpHandler($template,$dataBinder);
$statisticsHttpHandler->statistics($userService,$statisticService);
