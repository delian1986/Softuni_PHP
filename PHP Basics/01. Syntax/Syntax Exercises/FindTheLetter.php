<?php
$text = trim(fgets(STDIN));
$args = explode(" ", trim(fgets(STDIN)));
$letter = $args[0];
$countTimes = intval($args[1]);
$indexOfNeedle = 0;
$counter = 0;

for ($i = 1; $i <= $countTimes; $i++) {
        $indexOfOccur = strpos($text, $letter);
        $text = substr($text, $indexOfOccur + 1);
        $indexOfNeedle += $indexOfOccur;
    if (strpos($text, $letter)) {
        $counter++;
        print_r($text);
    }
}
print_r($counter);
if ($counter == $countTimes) {
    $indexOfNeedle += $countTimes - 1;
    echo $indexOfNeedle;
} else {
    echo "Find the letter yourself!";
}



