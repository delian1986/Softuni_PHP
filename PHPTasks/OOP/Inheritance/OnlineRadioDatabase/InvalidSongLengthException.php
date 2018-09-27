<?php


namespace Radio;


use Throwable;

class InvalidSongLengthException extends InvalidSongException
{
    public function __construct(string $message = "Invalid song length.\n", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        parent::__toString();
    }

}