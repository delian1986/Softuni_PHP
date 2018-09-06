<ul>
<?php
/**
 * Created by PhpStorm.
 * User: pc-123
 * Date: 05-Sep-18
 * Time: 21:47
 */

for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 1) {
        echo "<li><span style='color:blue'>$i</span></li>";
    } else {
        echo "<li><span style='color:green'>$i</span></li>";
    }
}
?>
</ul>
