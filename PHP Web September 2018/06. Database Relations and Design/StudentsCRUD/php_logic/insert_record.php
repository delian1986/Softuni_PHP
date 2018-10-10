<?php
require_once '../db_connect/db_connect.php';

if(isset($_POST['first_name'])and isset($_POST['last_name'])and isset($_POST['stud_number'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $stud_number=$_POST['stud_number'];

    $insertQuery=$db->prepare("INSERT INTO students(first_name,last_name,stud_number)VALUES (?,?,?)");
    $insertQuery->bind_param("sss",$first_name,$last_name,$stud_number);
    $insertQuery->execute();

    if ($insertQuery->affected_rows==1){
        header("Location: ../views/display_all_students_view.php");
    }else{
        echo "<h1>Error!</h1>";
    }

}
