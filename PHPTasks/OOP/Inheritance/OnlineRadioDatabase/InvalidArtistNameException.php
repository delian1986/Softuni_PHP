<?php


namespace Radio;


use Throwable;

class InvalidArtistNameException extends InvalidSongException
{
    public function __construct(string $message = "Artist name should be between 3 and 20 symbols.\n", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        parent::__toString();
    }
}