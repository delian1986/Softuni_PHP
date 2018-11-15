<?php
spl_autoload_register();
$entryPointFileName=basename(__FILE__);
$self=$_SERVER['PHP_SELF'];
$self=str_replace($entryPointFileName,'',$self);
$uri=$_SERVER['REQUEST_URI'];
$significantUri= str_replace($self,'',$uri);
$significantUri= str_replace([$_SERVER['QUERY_STRING'],'?'],'',$significantUri);
$uriParts=explode('/',$significantUri);
$controllerName=array_shift($uriParts);
$actionName=array_shift($uriParts);
$params=$uriParts;

$app=new \Core\Application($controllerName,$actionName,$params);
$app->addMapping(\Services\User\UserServiceInterface::class,Services\User\UserService::class);

$app->start();


