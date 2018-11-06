<?php
spl_autoload_register();
session_start();
$dbInfo=parse_ini_file('Config/db.ini');
$db=new \Database\PDODatabase(new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['pass'],array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)));
$template= new \Core\Template();
$binder= new \Core\DataBinder();

