<?php


namespace Ferrari;
require "iDrive.php";

class Ferrari implements iDrive
{
    private $driver;
    public $model = "488-Spider";
    static $objNum;
    private $objCount;

    public function __construct(string $driver)
    {
        $this->setDriver($driver);
        self::$objNum++;
        $this->objCount = self::$objNum;
    }

    /**
     * @var string
     * */
    private function setDriver(string $driver)
    {
        $this->driver = $driver;
    }

    static function forUrl(string $str, string $rep = "-"):string
    {
       return str_replace(" ",$rep,$str);
    }

    public function pushBreaks(): string
    {
        return "Brakes!";
    }

    public function pushGasPedal(): string
    {
        return "Zadu6avam sA!";
    }

    public function __toString()
    {

        $output="$this->model/{$this->pushBreaks()}/{$this->pushGasPedal()}/$this->driver/inst. $this->objCount\n";
        return self::forUrl($output);
    }
}