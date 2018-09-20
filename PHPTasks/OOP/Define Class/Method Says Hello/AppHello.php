<?php
namespace Hello;
require_once 'Person.php';


class AppHello
{
    public function start(){
        $this->processInput();
    }

    private function processInput(){
        $personName=$this->readLine();
        $person=new Person($personName);
        echo $person->sayHello();
    }

    private function readLine(){
        return trim(fgets(STDIN));
    }
}

$app=new AppHello();
$app->start();