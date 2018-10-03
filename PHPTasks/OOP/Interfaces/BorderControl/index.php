<?php

namespace Control;

require_once "Citizen.php";
require_once "Robot.php";

$citizens = [];

while (1) {
    $input = readline();
    if ($input == "End") {
        break;
    }

    $person = null;
    $personArgs = explode(" ", $input);
    $name = $personArgs[0];
    $id = $personArgs[count($personArgs) - 1];
    if (count($personArgs) == 3) {
        $age = $personArgs[1];
        $person = new Citizen($name, $age, $id);

    }else{
    $person = new Robot($name, $id);
    }
    $citizens[]=$person;
}
$id=readline();
foreach ($citizens as $citizen){
    if ($citizen->validateId($id)){
        echo $citizen->getId().PHP_EOL;
    }
}


