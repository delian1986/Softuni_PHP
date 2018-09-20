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
    <?php
    if (isset($_GET["calculate"])){
        $operation=$_GET["operation"];
        $numOne=$_GET["number_one"];
        $numOTwo=$_GET["number_two"];
        echo "<div>";
        echo "Result: ";
        switch ($operation){
            case "sum":
                echo "<input type='text' disabled='disabled' readonly='readonly' value='".($numOne+$numOTwo).">";
                break;
            case "subtract":
                echo "<input type='text' disabled='disabled' readonly='readonly' value='".($numOne-$numOTwo).">";
        }
        echo "</div>";
    }
    ?>
    <div>
        <input type="submit" name="calculate" value="Calculate!"/>
    </div>
</form>
