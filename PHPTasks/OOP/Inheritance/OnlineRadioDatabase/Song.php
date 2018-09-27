<?php


namespace Radio;


class Song
{
    private $artist;
    private $song_name;
    private $seconds;

    public function __construct(string $artist, string $song_name, string $lenght)
    {
        $this->setArtist($artist);
        $this->setSongName($song_name);

    }

    private function setLenght($lenght){

    }

    private function setSongName($song_name)
    {
        if (strlen($song_name)<3 or strlen($song_name)>30){
            throw new InvalidSongNameException();
        }
        $this->song_name=$song_name;
    }

    private function setArtist($artist)
    {
        if (strlen($artist) < 3 or strlen($artist) > 20) {
            throw new InvalidArtistNameException();
        }
        $this->artist = $artist;
    }


}