<?php

include('../../db/connect.php');

$id = $_POST['id'];
$code = $_POST['code'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$sql = "UPDATE `intern_organization_request_assignments` SET `start_date`= '$start_date',`end_date` = '$end_date' WHERE id = $id";

// var_dump($sql);die;
if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">window.location.href ="../index.php?option=2&code='.$code.'"</script>';
} else {
    echo "Error updating record: " . $conn->error;
}