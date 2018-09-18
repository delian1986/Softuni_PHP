<?php

class DefineLanguages
{
    private $country;
    private $language;

    public function __construct(string $country)
    {
        $this->country = $country;
        $this->defineLanguage();
    }

    private function defineLanguage()
    {
        $country=$this->country;
        if ($country=="USA"||$country=="England") {
            $this->language="English";
        }else if($country=="Spain"||$country=="Argentina"||$country=="Mexico"){
            $this->language="Spanish";
        }else{
            $this->language="unknown";
        }
    }

    public function __toString()
    {
        return "$this->language";
    }

}

$country=readline();
$language=new DefineLanguages($country);
echo $language;