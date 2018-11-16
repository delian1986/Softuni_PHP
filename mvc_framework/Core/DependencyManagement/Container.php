<?php


namespace Core\DependencyManagement;




class Container implements ContainerInterface
{

    /**
     * @var array
     */
    private $dependencies;

    /**
     * @var array
     */
    private $cache;

    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->dependencies = [];
        $this->cache = [];
    }


    /**
     * @param $interfaceName
     * @return mixed|object
     * @throws \ReflectionException
     */
    public function resolve($interfaceName)
    {
        if (key_exists($interfaceName,$this->cache)){
            return $this->cache[$interfaceName];
        }

        if (interface_exists($interfaceName)){
            $className=$this->dependencies[$interfaceName];
        }elseif (class_exists($interfaceName)){
            $className=$interfaceName;
        }else{
            throw new \Exception('Resourse Unavalable');
        }

        $classInfo= new \ReflectionClass($className);
        $ctorInfo= $classInfo->getConstructor();

        if (null===$ctorInfo){
            $obj= new $className();
            $this->cache($className,$obj);
            return $obj;
        }

        $resolvedParams=[];
        foreach ($ctorInfo->getParameters() as $parameter){
            $resolvedParams[]=$this->resolve($parameter->getClass()->getName());
        }
        $obj=$classInfo->newInstanceArgs($resolvedParams);
        $this->cache($className,$obj);
        return $obj;
    }

    public function addDependency($interfaceName, $implementationName)
    {
        $this->dependencies[$interfaceName] = $implementationName;

    }

    public function cache($interfaceName, $obj)
    {
        $this->cache[$interfaceName] = $obj;

    }

    public function exists($interfaceName): bool
    {
        return array_key_exists($interfaceName,$this->dependencies);
    }
}