<?php
$speed=intval(fgets(STDIN));
$area=trim(fgets(STDIN));

$speedLimit=limitZone($area);
echo roadRadar($speedLimit,$speed);

function roadRadar($limit,$speed){
    $radarMesssage="";
    $radarResult=$speed-$limit;

    if ($radarResult<=20&&$radarResult>0){
        $radarMesssage="speeding";
    } else if($radarResult<=40&&$radarResult>20){
        $radarMesssage="excessive speeding";
    }else if($radarResult>40){
        $radarMesssage="reckless driving";
    }

    return $radarMesssage;

}

function limitZone($zone){
    $speedLimit=0;
    switch ($zone){
        case "motorway":
            $speedLimit=130;
            break;
        case "interstate":
            $speedLimit=90;
            break;
        case "city":
            $speedLimit=50;
            break;
        case "residential":
            $speedLimit=20;
            break;
    }

    return $speedLimit;
}

