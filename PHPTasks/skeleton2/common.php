<?php
session_start();
spl_autoload_register();

$template= new \Core\Template();
$dbInfo=parse_ini_file('Config/db.ini');
$pdo=new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['password'],array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$db= new Database\PDODatabase($pdo);
$userRepository=new \App\Repository\UserRepository($db);
$userService=new \App\Service\UserService($userRepository);
$userHttpHandler=new \App\Http\UserHttpHandler($userService,$template,new \Core\DataBinder());