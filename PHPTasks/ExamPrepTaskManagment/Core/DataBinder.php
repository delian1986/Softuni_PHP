<?php


namespace Core;



class DataBinder implements DataBinderInterface
{
    /**
     * @param array $form
     * @param $className
     * @return mixed
     * @throws \ReflectionException
     */
    public function bind(array $form, $className)
    {
        $classInfo= new \ReflectionClass($className);

        $object= new $className;
        foreach ($form as $key=>$value){
            if ($classInfo->hasProperty($key)){
                $prop=$classInfo->getProperty($key);
                $prop->setAccessible(true);
                $prop->setValue($object,$value);
            }
        }

        return $object;
    }
}