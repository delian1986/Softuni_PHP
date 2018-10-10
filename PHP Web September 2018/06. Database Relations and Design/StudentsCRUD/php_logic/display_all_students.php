<?php
require_once('../db_connect/db_connect.php');

$getAllStudentRecords = $db->query('SELECT * FROM students ORDER BY date_of_record DESC');

$resultTable = '<table>';
$resultTable .= '<tr>';
$resultTable .= '<th> Student ID </th>';
$resultTable .= '<th> First Name </th>';
$resultTable .= '<th> Last Name </th>';
$resultTable .= '<th> Student Number </th>';
$resultTable .= '<th> Phone Number </th>';
$resultTable .= '<th> Home Address </th>';
$resultTable .= '<th> Date Registered </th>';
$resultTable .= '<th> Date Edited </th>';
$resultTable .= '<th> Is Active </th>';
$resultTable .= '<th> Motivation Letter </th>';
$resultTable .= '<th> Notes </th>';
$resultTable .= '<th> Edit </th>';
$resultTable .= '<th> Delete </th>';
$resultTable .= '</tr>';

if ($getAllStudentRecords->num_rows == 0) {
    $resultTable .= '<tr ><td align="center" colspan="11">Empty table</td></tr>';
} else {
    while ($row = $getAllStudentRecords->fetch_assoc()) {
        $resultTable .= "<tr>";
        foreach ($row as $item) {
            $escaped=htmlspecialchars($item);
            $resultTable .= "<td>$escaped</td>";
        }
        $delLink="../php_logic/delete.php?id=".$row['student_id'];
        $editLink="edit_view.php?id=".$row['student_id'];

        $resultTable.="<td><a href='$editLink'>edit me</a></td>";
        $resultTable.="<td><a href='$delLink'>delete me</a></td>";
        $resultTable .= "</tr>";
    }
}

$resultTable .= '</table>';
echo $resultTable;

