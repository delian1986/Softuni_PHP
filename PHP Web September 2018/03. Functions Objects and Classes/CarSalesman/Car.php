<?php


namespace CarSalesman;


class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct( $model,  $engine, $weight=null,  $color=null)
    {
        $this->model=$model;
        $this->engine=$engine;
        $this->weight=$weight;
        $this->color=$color;
    }

    public function setWeight( $weight):void {
        $this->weight=$weight;
    }

    public function setColor( $color){
        $this->color=$color;
    }

    public function __toString()
    {
        $weight=$this->weight?$this->weight:"n/a";
        $color=$this->color?$this->color:"n/a";

        $result="$this->model:\n";
        $result.="$this->engine";
        $result.="  Weight: $weight\n";
        $result.="  Color: $color\n";
        return $result;
    }
}