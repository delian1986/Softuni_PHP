<?php


namespace App\Data;


class DtoValidator
{
    /**
     * @param $min
     * @param $max
     * @param $value
     * @param $type
     * @param $fieldName
     * @return bool
     * @throws \Exception
     */
    public static function validate($min, $max, $value, $type, $fieldName): bool
    {
        if ($type === 'text') {
            if (mb_strlen($value) < $min || mb_strlen($value) > $max) {
                throw new \Exception("{$fieldName} must be between {$min} and {$max} characters!");
            }
        } else if ($type === 'number') {
            if (is_numeric($value)) {
                if ($value < $min || $value > $max) {
                    throw new \Exception("{$fieldName} must be between {$min} and {$max}!");
                }
            }else{
                throw new \Exception('Please enter number');
            }
        }
        return true;
    }
}