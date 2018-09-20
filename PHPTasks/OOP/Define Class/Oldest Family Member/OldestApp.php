<?php
namespace Oldest;
use Hello\AppHello;

require_once 'Person.php';
require_once 'Family.php';


class OldestApp
{
    public function start(){
        $this->proceedInput();
    }
    private function proceedInput(){
        $numOfPeople=intval($this->readLine());
        $currFamily=$this->populateFamily($numOfPeople);
        $oldestMember=$currFamily->getOldest();
        echo $oldestMember;
    }

    private function populateFamily(int $familyMembers):Family{
        $family=new Family();
        for ($i=0;$i<$familyMembers;$i++){
            list($name,$age)=explode(" ",$this->readLine());
            $person=new Person($name,$age);
            $family->addMember($person);
        }
        return $family;
    }
    private function readLine(){
        return trim(fgets(STDIN));
    }
}

$app=new OldestApp();
$app->start();