<?php
$teamScore = [];
$teamPlayersScore = [];

while (true) {
    $line = trim(fgets(STDIN));
    if ($line == "Result") {
        break;
    }

    $args = explode("|", $line);
    $score = intval($args[2]);
    $teamName = "";
    $playerName = "";

    $teamPattern = '/^[A-Z@%\$*]{2,}$/';
    if (preg_match($teamPattern, $args[0]) == 1) {
        $teamName = preg_replace('/[@%\$*]/', "", $args[0]);
        $playerName = preg_replace('/[@%\$*]/', "", $args[1]);
    } else {
        $teamName = preg_replace('/[@%\$*]/', "", $args[1]);
        $playerName = preg_replace('/[@%\$*]/', "", $args[0]);
    }

    if (!array_key_exists($teamName, $teamPlayersScore)) {
        $teamPlayersScore[$teamName] = [];
        $teamScore[$teamName] = 0;
    }

    $teamScore[$teamName] += $score;
    $teamPlayersScore[$teamName][$playerName] = $score;
}

arsort($teamScore);
foreach ($teamScore as $key => $value) {
    echo "$key => $value"."\n";

    arsort($teamPlayersScore[$key]);
    foreach ($teamPlayersScore[$key] as $index => $item) {
        echo "Most points scored by $index" . "\n";
        break;
    }
}

