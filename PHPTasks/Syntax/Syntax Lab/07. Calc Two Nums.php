<?php
    var_dump($_GET);
    if (isset($_GET["calculate"])){
        $operation=$_GET["operation"];
        $numOne=$_GET["number_one"];
        $numOTwo=$_GET["number_two"];

        switch ($operation){
            case "sum":
                echo " == ".($numOne+$numOTwo);
                break;
            case "subtract":
                echo " == ".($numOne-$numOTwo);
        }
    }
?>

<form method="get">
    <div>
        Operation:
        <select name="operation">
            <option value="sum">Sum</option>
            <option value="subtract">Subtract</option>
        </select>
    </div>
    <div>
        Number 1:
        <input type="text" name="number_one"/>
    </div>
    <div>
        Number 2:
        <input type="text" name="number_two"/>
    </div>
    <div>
        <input type="submit" name="calculate" value="Calculate!"/>
    </div>
</form>
