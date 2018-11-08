<?php


namespace Core;



class DataBinder implements DataBinderInterface
{
    public function bind(array $form, $className)
    {
        $object = new $className();
        foreach ($form as $key => $value) {
            $tokens = explode('_', $key);
            $methodName = 'set'.$tokens[0];
            for ($i = 1; $i < count($tokens); $i++) {
                $methodName .= ucfirst($tokens[1]);
            }

            if (method_exists($object, $methodName)) {
                $object->$methodName($value);
            }
        }

        return $object;
    }
}