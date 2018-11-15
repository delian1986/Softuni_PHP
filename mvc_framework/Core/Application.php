<?php


namespace Core;


use Core\Http\Request;
use Core\Http\RequestInterface;
use Core\View\View;

class Application
{
    /**
     * @var string
     */
    private $controllerName;

    /**
     * @var string
     */
    private $actionName;

    /**
     * @var array
     */
    private $params;

    /**
     * @var array
     */
    private $mappings=[];

    /**
     * @var array
     */
    private $instances=[];

    /**
     * Application constructor.
     * @param string $controllerName
     * @param string $actionName
     * @param array $params
     */
    public function __construct(string $controllerName, string $actionName, array $params)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->params = $params;
    }


    public function start(): void
    {
        $fullQualifiedName='Controllers\\'. ucfirst($this->controllerName) .'Controller';
        $request=$this->initiateRequester();

        $this->instances[RequestInterface::class]=$request;


        $view=new View($request);
        $controller= new $fullQualifiedName($view,$request);

        $methodInfo=new \ReflectionMethod($fullQualifiedName,$this->actionName);
        foreach ($methodInfo->getParameters() as $parameter){
            var_dump($parameter->getType()->getName());
        }

        call_user_func_array(
            [$controller,$this->actionName],$this->params
        );


    }

    private function initiateRequester():RequestInterface{
        return new Request($this->controllerName,$this->actionName,$_SERVER['QUERY_STRING']);
    }

    public function addMapping(string $interface, string $className){
        $this->mappings[$interface]=$className;
    }

    private function addInstance(string $interface, $instance){
        $this->instances[$interface]=$instance;
    }


}