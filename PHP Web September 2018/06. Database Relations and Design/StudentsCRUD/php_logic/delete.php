<?php
require_once('../db_connect/db_connect.php');

if (isset($_GET['id'])) {
    $delStm = $db->prepare("DELETE FROM students WHERE student_id=?");
    $delId = $_GET['id'];
    $delStm->bind_param("i", $delId);
    $delStm->execute();

    if ($delStm->affected_rows == 1) {
        header("Location: ../views/display_all_students_view.php");
    }else{
        echo "Error proceeding";
    }
} else {
    echo 'You cannot delete this record';
}

