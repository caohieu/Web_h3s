<?php
if (isset($_GET['duyet']))
{
    include('../../db/ketnoi.php');
    $idRequests = $_GET['idRequests'];
    $query = mysqli_query($conn,"UPDATE `intern_organization_requests` SET `status` = '1' WHERE `intern_organization_requests`.`id` = $idRequests");
    if(!$query) {echo "Có lỗi xảy ra ";}else{echo "Duyệt thành công";};
};
?>
<!DOCTYPE html>
<form action='../../login/teacher.php' method='GET'>
    <input style='display: none' name='usrname' value='<?php echo $_GET['teacherCode']?>'>
    <input style='display: none' name='psw'>
    <input type='submit' value='Trở về' name='dangnhap'>
</form>