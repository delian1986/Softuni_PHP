<?php
if (isset($_GET['cel'])) {
    $cel = $_GET['cel'];
    $celToFah = $cel * 9 / 5 + 32;
    $msgAfterCelsius = $cel . " &deg " . "C = " . $celToFah . " &deg " . "F";
    echo $msgAfterCelsius;
}

if (isset($_GET['fah'])) {
    $fah = $_GET['fah'];
    $fahToCel = ($fah - 32)* 5 / 9 ;
    $msgAfterCelsius = $fah . " &deg " . "F = " . $fahToCel . " &deg " . "C";
    echo $msgAfterCelsius;
}
?>

<form>
    Celsius: <input type="text" name="cel"/>
    <input type="submit" value="Convert">
    <?= $msgAfterCelsius ?>
</form>
<form>
    Fahrenheit: <input type="text" name="fah"/>
    <input type="submit" value="Convert">
</form>

