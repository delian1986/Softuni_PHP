<!DOCTYPE html>
<html>
<body>
<header>
    <link rel="stylesheet" href="../styles/styles.css">

    <?php require_once('../views/navbar.php') ?>
</header>

<h2>Insert Student to database</h2>
<p>This form will be submitted using the POST method:</p>

<form action="../php_logic/insert_record.php" method="POST">
    First name:<br>
    <input type="text" name="first_name" value="Mickey">
    <br>
    Last name:<br>
    <input type="text" name="last_name" value="Mouse">
    <br>
    Student Number:<br>
    <input type="text" name="stud_number">
    <br>
    <br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>