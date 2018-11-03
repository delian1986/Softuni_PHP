<?php
spl_autoload_register();
$pdo = new PDO("mysql:host=localhost;dbname=skeleton", "root", "");

$db = new \Database\PDODatabase($pdo);
$stmt = $db->query('SELECT * FROM users');
$rs = $stmt->execute();
$allUsers = $rs->fetch(Users::class);

echo '<table border="1">';
/** @var Users $user */
foreach ($allUsers = $rs->fetch(Users::class) as $user) {
    echo '<tr>';
    echo '<td>' . $user->getUsername() . '</td>';
    echo '<td>' . $user->getPassword() . '</td>';
    echo '</tr>';
}
echo '</table>';



