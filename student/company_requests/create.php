<?php
include('../../db/connect.php');
$req_id = $_POST['req_id'];
$student_id = $_POST['student_id'];
$code = $_POST['code'];
$date = date('Y-m-d H:i:s');

$sql = "SELECT * FROM `intern_student_registers` WHERE student_id = $student_id AND request_id = $req_id";
$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query) == 0){
    $sql = "INSERT INTO `intern_student_registers`(`student_id`, `request_id`, `status`, `created_at`) 
            VALUES ($student_id,$req_id,0,'$date')";

    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">window.location.href ="../index.php?msg=success&option=1&code='.$code.'"</script>';
    } else {
        echo '<script language="javascript">window.location.href ="../index.php?msg=error&option=1&code='.$code.'"</script>';
    }
} else {
    echo '<script language="javascript">window.location.href ="../index.php?already=1&option=1&code='.$code.'"</script>';
}

