<?php
if (isset($_GET['xacnhan']))
{
    include('../../db/ketnoi.php');
    $startdate = $_GET['startdate'];
    $enddate = $_GET['enddate'];
    $status= $_GET['stt'];
    $assignmentId= $_GET['assignmentId'];
    $query = mysqli_query($conn,"UPDATE `intern_organization_request_assignment`  SET `start_date` = '$startdate', `end_date` = '$enddate',`status`='$status' WHERE `intern_organization_request_assignment`.`id`='$assignmentId'");
    if(!$query) {echo "Có lỗi xảy ra ";}else{echo "sửa thành công";};
};
?>
<!DOCTYPE html>
<form action='../../login/student.php' method='GET'>
<input style='display: none' name='usrname' value='<?php echo $_GET['studentCodes']?>'>
<input style='display: none' name='psw'>
<input type='submit' value='Trở về' name='dangnhap'>
</form>