<?php

include('../../db/connect.php');
$company_id = $_POST['company_id'];
$code = $_POST['code'];
$positon = $_POST['positon'];
$short_description = $_POST['short_description'];
$amount = $_POST['amount'];
$ability = $_POST['ability'];
$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO `intern_organization_requests`
            (`organization_id`, `position`, `short_description`, `amount`, `status`, `created_at`) 
            VALUES ($company_id,'$positon','$short_description',$amount,2000,'$date')";

if (mysqli_query($conn, $sql)) {
    $request_id = $conn->insert_id;
    // Thêm các trường mới
    foreach ($ability as $key => $value ){
        $require = $value['require'];
        $note = $value['note'];
        $sql = "INSERT INTO `intern_organization_request_abilities`
                            (`organization_request_id`, `ability_id`, `ability_rate_required`,`note`) 
                            VALUES ($request_id,$key,$require,'$note')";
        mysqli_query($conn, $sql);
    }
    echo '<script language="javascript">window.location.href ="../index.php?msg=success&code='.$code.'"</script>';
} else {
    echo '<script language="javascript">window.location.href ="../index.php?msg=error&code='.$code.'"</script>';
}




