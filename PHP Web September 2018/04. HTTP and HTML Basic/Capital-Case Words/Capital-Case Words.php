<?php
if (isset($_GET['text'])) {
    $result = [];
    $text = $_GET['text'];
    $words = preg_split('/[^a-zA-Z]+/m', $text);
    foreach ($words as $word) {
        if (preg_match('/\b[A-Z]+\b/m', $word)) {
            $result[]=$word;
        }
    }
    echo implode(", ",$result);
}
?>
<form>
    <textarea rows="10" name="text"></textarea><br>
    <input type="submit" value="Extract">
</form>


