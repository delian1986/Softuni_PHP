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
    private $mappings = [];

    /**
     * @var array
     */
    private $instances = [];

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


    /**
     * @throws \ReflectionException
     */
    public function start(): void
    {
        $fullQualifiedName = 'Controllers\\' . ucfirst($this->controllerName) . 'Controller';
        $request = $this->initiateRequester();

        $this->instances[RequestInterface::class] = $request;

        $view = new View($request);
        $controller = new $fullQualifiedName($view, $request);

        $methodInfo = new \ReflectionMethod($fullQualifiedName, $this->actionName);
        for($i=count($this->params);$i<count($methodInfo->getParameters()); $i++) {
            $parameter=$methodInfo->getParameters()[$i];
            $paramType = $parameter->getType();
            if (null === $paramType) {
                continue;
            }

            $interfaceName = $paramType->getName();
            $instance=$this->resolveDependencies($interfaceName);
            $this->params[]=$instance;
        }

        call_user_func_array(
            [$controller, $this->actionName], $this->params
        );


    }

    /**
     * @param string $interfaceName
     * @return mixed
     * @throws \ReflectionException
     */
    private function resolveDependencies(string $interfaceName)
    {
        if(key_exists($interfaceName,$this->instances)){
            return $this->instances[$interfaceName];
        }

        $className=$this->mappings[$interfaceName];
        $classInfo=new \ReflectionClass($className);
        $constructorInfo=$classInfo->getConstructor();
        if (null===$constructorInfo || count($constructorInfo->getParameters())===0){
            $instance= new $className();
            $this->instances[$interfaceName]=$instance;
            return $instance;
        }

        $instanceArguments=[];
        foreach ($constructorInfo->getParameters() as $parameter){
            $paramType = $parameter->getType();
            if (null === $paramType) {
                continue;
            }

            $dependentInterface = $paramType->getName();
            $instance=$this->resolveDependencies($dependentInterface);
            $instanceArguments[]=$instance;
        }
        $instance=$classInfo->newInstanceArgs($instanceArguments);
        $this->instances[$interfaceName]=$instance;
        return $instance;
    }

    private function initiateRequester(): RequestInterface
    {
        return new Request($this->controllerName, $this->actionName, $_SERVER['QUERY_STRING']);
    }

    public function addMapping(string $interface, string $className)
    {
        $this->mappings[$interface] = $className;
    }

    private function addInstance(string $interface, $instance)
    {
        $this->instances[$interface] = $instance;
    }


}