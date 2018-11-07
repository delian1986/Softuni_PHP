<?php
session_start();
spl_autoload_register();

$template= new \Core\Template();
$dbInfo=parse_ini_file('Config/db.ini');
$pdo=new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['password'],array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dataBinder=new \Core\DataBinder();
$db= new Database\PDODatabase($pdo);
$userRepository=new \App\Repository\UserRepository($db,$dataBinder);
$userService=new \App\Service\UserService($userRepository);
$userHttpHandler=new \App\Http\UserHttpHandler($template,new \Core\DataBinder());
