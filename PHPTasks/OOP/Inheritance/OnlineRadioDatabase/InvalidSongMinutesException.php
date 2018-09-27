<?php


namespace Radio;


use Throwable;

class InvalidSongMinutesException extends InvalidSongLengthException
{
    public function __construct(string $message = "Song minutes should be between 0 and 14.\n", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}