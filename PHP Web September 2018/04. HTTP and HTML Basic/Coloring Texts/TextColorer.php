<?php
if (isset($_GET['input'])) {
    $words = $_GET['input'];
    $html = "";
    $text = explode(" ", $words);
    $word=implode("",$text);
    for ($i = 0; $i < strlen($word); $i++) {
        $element = "";
        if (ord ( $word[$i] ) % 2 == 1) {
            $element = "<span style=\"color:blue\">$word[$i]</span>";
        } else {
            $element = "<span style=\"color:red\">$word[$i]</span>";
        }
        $html .= $element;
    }
    echo $html;
}
?>

<form>
    <textarea rows="2" name="input"></textarea><br>
    <input type="submit" value="Count words">
</form>

