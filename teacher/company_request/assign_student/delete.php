<?php 

include("../../../db/connect.php");

$code = $_POST['code'];
$student_id = $_POST['student_id'];
$request_id = $_POST['request_id'];
$status = 0;
$created_at = date("Y-m-d H:i:s");

$sql = "DELETE FROM `intern_organization_request_assignments` WHERE student_id = $student_id AND organization_request_id = $request_id";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">window.location.href ="../assign_student/index.php?req='.$request_id.'&code='.$code.'"</script>';
} else {
    echo "Error updating record: " . $conn->error;
}