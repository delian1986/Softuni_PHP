<?php


namespace Box;


class Box
{
    protected $length;
    protected $width;
    protected $height;

    public function __construct(float $length,float $width,float $height)
    {
        $this->length=$length;
        $this->width=$width;
        $this->height=$height;

    }

    public function surfaceArea() {
        $surfaceArea=2*($this->length*$this->width)
            +2*($this->height*$this->length)
            +2*($this->height*$this->width);

        return sprintf('%0.2f',$surfaceArea);
    }

    public function lateralSurfaceArea() {
        $lateralArea=2*($this->length*$this->height)
            +2*($this->width*$this->height);

        return sprintf('%0.2f',$lateralArea);
    }

    public function volume() {
        $vol=$this->length*$this->height*$this->width;

        return sprintf("%.2f",$vol);
    }

    public function __toString()
    {
        $surArea=$this->surfaceArea();
        $latArea=$this->lateralSurfaceArea();
        $volume=$this->volume();
        
        $result="Surface Area - $surArea\n";
        $result.="Lateral Surface Area - $latArea\n";
        $result.="Volume - $volume\n";

        return $result;
    }
}