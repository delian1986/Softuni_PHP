<?php
if (isset($_GET['lines'])) {
    $lines = $_GET['lines'];
    $sorted=explode("\n",$lines);
    sort($sorted);
    $sortedLines=implode("\n",$sorted);
}
?>

<form>
  <textarea rows="10" name="lines"><?= $sortedLines
      ?></textarea> <br>
    <input type="submit" value="Sort">
</form>

