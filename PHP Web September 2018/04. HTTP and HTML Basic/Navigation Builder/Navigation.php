<?php
if (isset($_GET['categories']) and isset($_GET['tags']) and isset($_GET['months'])) {
    $html="";
    $categories=explode(", ",$_GET['categories']);
    $tags=explode(", ",$_GET['tags']);
    $months=explode(", ",$_GET['months']);

    $html.="<h2>Categories</h2>";
    $html.="<ul>";
    foreach ($categories as $cat){
        $html.="<li>$cat</li>";
    }
    $html.="</ul>";


    $html.="<h2>Tags</h2>";
    $html.="<ul>";
    foreach ($tags as $tag){
        $html.="<li>$tag</li>";
    }
    $html.="</ul>";


    $html.="<h2>Months</h2>";
    $html.="<ul>";

    foreach ($months as $month){
        $html.="<li>$month</li>";
    }
    $html.="</ul>";

    echo $html;
}
?>
<form>
    Categories:<input type="text" name="categories"><br>
    Tags:<input type="text" name="tags"><br>
    Months:<input type="text" name="months"><br>
    <input type="submit" name="Generate"><br>
</form>
