<?php
spl_autoload_register();
$uri=$_SERVER['REQUEST_URI'];
$self=str_replace(basename(__FILE__),'',$_SERVER['PHP_SELF']);
$uriParts=explode('/',str_replace($self,'',$uri));

$controllerName=array_shift($uriParts);
$actionName=array_shift($uriParts);
$modelBinder= new \Core\ModelBinding\ModelBinder();
$request=new \Core\Http\Request($controllerName,$actionName,$uriParts,$_SERVER['QUERY_STRING'],$self,$_SERVER['HTTP_HOST']);
$dbInfo=parse_ini_file('Config/db.ini');
$pdo= new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['password']);
$db= new \Database\PDODatabase($pdo);
$container=new \Core\DependencyManagement\Container();
$container->cache(\Core\DependencyManagement\ContainerInterface::class,$container);
$container->cache(\Database\DatabaseInterface::class, $db);
$container->cache(\Core\Http\RequestInterface::class,$request);
$container->addDependency(\Core\ModelBinding\ModelBinderInterface::class,\Core\ModelBinding\ModelBinder::class);
$container->addDependency(\Service\Users\UserServiceInterface::class, \Service\Users\UserService::class);
$container->addDependency(\Repository\User\UserRepositoryInterface::class,\Repository\User\UserRepository::class);
$container->addDependency(\Core\View\ViewInterface::class,\Core\View\View::class);
$container->addDependency(\Core\AppInterface::class,\Core\App::class);
$container->addDependency(\Core\Http\UrlBuilderInterface::class,\Core\Http\UrlBuilder::class);
$app=$container->resolve(\Core\AppInterface::class);
$app->run();