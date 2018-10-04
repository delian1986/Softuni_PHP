<?php
if (isset($_GET['input'])) {
    $result = [];
    $text = $_GET['input'];
    preg_match_all('/[A-Za-z]+/m', $text, $matches, PREG_SET_ORDER, 0);
    foreach ($matches as $match) {
        $word = strtolower($match[0]);
        if (!isset($result[$word])) {
            $result[$word] = 0;
        }
        $result[$word]++;
    }
//    var_dump($result);
    $html = "<table border='2'>";
    foreach ($result as $word => $count) {
        $html .= "<tr><td>$word</td><td>$count</td></tr>";
    }
    $html .= "</table>";
    echo $html;
}
?>

<?= $html ?>
<form>
    <textarea rows="2" name="input"></textarea><br>
    <input type="submit" value="Count words">
</form>

