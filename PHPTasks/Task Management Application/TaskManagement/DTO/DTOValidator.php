<?php


namespace TaskManagement\DTO;


class DTOValidator
{
    /**
     * @param $min
     * @param $max
     * @param $value
     * @param $errorMessage
     * @throws \Exception
     */
    public static function validate($min, $max, $value, $errorMessage)
    {
        if (mb_strlen($value)<$min
            or mb_strlen($value)>$max){
            throw new \Exception($errorMessage);
        }
    }
}