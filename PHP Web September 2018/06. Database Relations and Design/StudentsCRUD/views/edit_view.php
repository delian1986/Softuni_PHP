<?php require_once('../php_logic/edit_get.php') ?>
<!DOCTYPE html>
<html>
<body>
<header>
    <link rel="stylesheet" href="../styles/styles.css">

    <?php require_once('../views/navbar.php') ?>
</header>

<h2>Edit Student</h2>

<form action="../php_logic/edit_post.php" method="POST">
    <input type="hidden" name="id" value="<?= $editId ?>">
    First name:<br>
    <input type="text" name="first_name" value="<?= $fname?>">
    <br>
    Last name:<br>
    <input type="text" name="last_name" value="<?= $lname ?>">
    <br>
    Student Number:<br>
    <input type="text" name="stud_number" value="<?= $stud_num ?>">
    <br>
    <br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>