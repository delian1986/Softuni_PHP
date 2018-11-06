<?php


namespace App\Data;


class SuccessDTO
{

    private $message;
    /**
     * SuccessDTO constructor.
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

}