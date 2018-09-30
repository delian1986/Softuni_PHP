<?php


namespace CarSalesman;


class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct( $model, $power, $displacement=null, $efficiency=null)
    {
        $this->model=$model;
        $this->power=$power;
        $this->displacement=$displacement;
        $this->efficiency=$efficiency;
    }

    public function setDisplacement( $displacement){
        $this->displacement=$displacement;
    }

    public function setEfficiency( $efficiency) {
        $this->efficiency=$efficiency;
    }

    public function __toString()
    {
        $displacement=$this->displacement?$this->displacement:"n/a";
        $efficiency=$this->efficiency?$this->efficiency:"n/a";

        $result="  $this->model:\n";
        $result.="    Power: $this->power\n";
        $result.="    Displacement: $displacement\n";
        $result.="    Efficiency: $efficiency\n";
        return $result;
    }

}