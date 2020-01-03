<?php 
    include('../../db/connect.php');
    // var_dump($_POST);die;
    $code = $_POST['code'];
    $request_id = $_POST['request_id'];
    $positon = $_POST['positon'];
    $short_description = $_POST['short_description'];
    $amount = $_POST['amount'];
    $ability = $_POST['ability'];

    
    $sql = "UPDATE intern_organization_requests 
                SET position='$positon',short_description='$short_description',amount=$amount
                WHERE `id` = $request_id";

    if (mysqli_query($conn, $sql)) {
        // Xoá tất cả các trường ở bảng intern_organization_request_abilities
        $sql = "DELETE FROM `intern_organization_request_abilities` WHERE `organization_request_id`= $request_id";
        mysqli_query($conn, $sql);
        // Thêm các trường mới
        foreach ($ability as $key => $value ){
            // var_dump($value);
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
?>