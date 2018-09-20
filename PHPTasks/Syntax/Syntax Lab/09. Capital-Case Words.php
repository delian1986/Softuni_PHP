<?php
if (isset($_GET['text'])) {
    $text = $_GET['text'];
    preg_match_all('/\b[A-Z]+\b/', $text, $words);
    echo implode(', ', $words[0]);
}
?>

<form>
    Name: <input type="text" name="text" />
    <input type="submit" />
</form>

