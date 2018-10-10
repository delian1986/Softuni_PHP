<?php
require_once '../db_connect/db_connect.php';

if(isset($_POST['first_name'])and isset($_POST['last_name'])and isset($_POST['stud_number'])) {
    var_dump($_POST);
    $id=$_POST['id'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $stud_number=$_POST['stud_number'];
    $date_of_change=(new DateTime())->format('Y-m-d H:i:s');

    $insertQuery=$db->prepare("UPDATE students SET first_name=?,last_name=?,stud_number=?,date_of_last_change=? WHERE student_id=?");
    $insertQuery->bind_param("sssss",$first_name,$last_name,$stud_number,$date_of_change,$id);
    $insertQuery->execute();

    if ($insertQuery->affected_rows==1){
        header("Location: ../views/display_all_students_view.php");
    }else{
        echo "<h1>Error!</h1>";
    }
}


