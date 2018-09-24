<?php
$users=[];
$unsuccessfulLoginAttempts=0;

while (1){
    $line=readline();
    if ($line=="login"){
        break;
    }
    list($user,$pass)=explode(" -> ",$line);
    $users[$user]=$pass;
}

while (1) {
    $line = readline();
    if ($line == "end") {
        break;
    }
    list($user,$pass)=explode(" -> ",$line);
    if (isset($users[$user]) and $users[$user]===$pass){
        echo "$user: logged in successfully\n";
    }else{
        echo "$user: login failed\n";
        $unsuccessfulLoginAttempts++;
    }
}

echo "unsuccessful login attempts: ".$unsuccessfulLoginAttempts.PHP_EOL;
