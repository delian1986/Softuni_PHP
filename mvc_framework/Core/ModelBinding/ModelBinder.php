<?php


namespace Core\ModelBinding;


class ModelBinder implements ModelBinderInterface
{

    /**
     * @param array $data
     * @param $className
     * @return mixed
     * @throws \ReflectionException
     */
    public function bind(array $data, $className)
    {
        $bindingModel = new $className();
        $properties = new \ReflectionClass($bindingModel);
        foreach ($properties->getProperties() as $property) {
            $propertyName = $property->getName();
            if (array_key_exists($propertyName, $data)) {
                $setter = 'set' . implode(array_map(function ($element) {
                        return ucfirst($element);
                    }, explode('_', $propertyName)));
                $bindingModel->$setter($data[$propertyName]);
            }
        }

        return $bindingModel;
    }
}