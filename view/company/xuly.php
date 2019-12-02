<?php
if (isset($_GET['suaphieu']))
{
    include('../../db/ketnoi.php');
    $id=$_GET['idRequests'];
    $description = $_GET['description'];
    $need = $_GET['need'];
    //$tt= $_GET['tt'];
    $query = mysqli_query($conn,"UPDATE `intern_organization_requests`  SET `short_description` = '$description', `amount` = '$need',`status`='0' WHERE `intern_organization_requests`.`id`='$id'");
    if(!$query) {echo "Có lỗi xảy ra ";}else{echo "sửa thành công";};
};
?>
<!DOCTYPE html>
<form action='../../login/company.php' method='GET'>
    <input style='display: none' name='usrname' value='<?php echo $_GET['companyCode']?>'>
    <input style='display: none' name='psw'>
    <input type='submit' value='Trở về' name='dangnhap'>
</form>