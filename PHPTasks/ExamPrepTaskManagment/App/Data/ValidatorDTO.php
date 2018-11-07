<?php


namespace App\Data;


class ValidatorDTO
{
    /**
     * @param $min
     * @param $max
     * @param $value
     * @param $message
     * @return bool
     * @throws \Exception
     */
    public static function validate($min, $max, $value, $message):bool{
        if (mb_strlen($value)>=$min and mb_strlen($value)<=$max){
            return true;
        }else{
            throw new \Exception($message);
        }

    }
}