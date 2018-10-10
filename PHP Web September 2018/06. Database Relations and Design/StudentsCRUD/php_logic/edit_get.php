<?php
require_once('../db_connect/db_connect.php');

if (isset($_GET['id'])) {
    $getCurrStudentRecords = $db->prepare('SELECT * FROM students WHERE student_id=?');
    $editId = $_GET['id'];
    $getCurrStudentRecords->bind_param('i', $editId);
    $getCurrStudentRecords->execute();

    $result = $getCurrStudentRecords->get_result();
    foreach ($row = $result->fetch_assoc() as $key => $item) {
        switch ($key){
            case "first_name":
                $fname=$item;
                    break;
            case "last_name":
                $lname=$item;
                break;
            case "stud_number":
                $stud_num=$item;
                break;
        }
    }


} else {
    echo 'You cannot delete this record';
}

