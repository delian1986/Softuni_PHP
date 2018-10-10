<?php
require_once('../db_connect/db_connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Title</title>
</head>
<body>
<header>
    <?php require_once('../views/navbar.php') ?>
</header>

<h1>List of all student records</h1>
<?php require_once ('../php_logic/display_all_students.php')?>

</body>
</html>



