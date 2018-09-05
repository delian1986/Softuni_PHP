<?php
/**
 * Created by PhpStorm.
 * User: DelyaN
 * Date: 26.1.2018 г.
 * Time: 23:06 ч.
 */
if(isset($_GET['person'])){
    $person=htmlspecialchars($_GET['person']);
    echo "Hello, $person!";

}
else{
    ?>
    <form>
    Name:<input type="text" name="person"/>
    <input type="submit"/>
</form>
<?php }


?>


