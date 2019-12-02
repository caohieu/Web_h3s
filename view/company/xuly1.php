<?php
if (isset($_GET['dangky']))
{
    include('../../db/ketnoi.php');
    $organization_id=$_GET['companyId'];
    $description = $_GET['description'];
    $need = $_GET['need'];
    $date= $_GET['date'];
    $count= mysqli_query($conn,"SELECT COUNT(*) FROM intern_organization_requests");
    $id = mysqli_fetch_array($count)[0]+1;
    $query = mysqli_query($conn,"INSERT INTO `intern_organization_requests` (`id`, `organization_id`, `subject`, `short_description`, `amount`, `date_submitted`, `status`) VALUES ('$id','$organization_id', 'k', '$description', '$need', '$date', '0')");
    if(!$query) {echo "Có lỗi xảy ra ";}else{echo "thêm thành công";};
};
?>
<!DOCTYPE html>
<form action='../../login/company.php' method='GET'>
    <input style='display: none' name='usrname' value='<?php echo $_GET['companyCode']?>'>
    <input style='display: none' name='psw'>
    <input type='submit' value='Trở về' name='dangnhap'>
</form>