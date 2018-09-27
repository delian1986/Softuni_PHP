<?php


namespace Radio;


use Throwable;

class InvalidSongException extends \Exception
{
    public function __construct(string $message = "Invalid song.\n", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        parent::__toString();
    }

}