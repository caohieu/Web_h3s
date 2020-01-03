<?php

include('../../db/connect.php');

$id = $_GET['id'];
$status = $_GET['status'];
$code = $_GET['code'];
$sql = "UPDATE `intern_organization_request_assignments` SET `status`= $status WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">window.location.href ="../index.php?option=2&code='.$code.'"</script>';
} else {
    echo "Error updating record: " . $conn->error;
}