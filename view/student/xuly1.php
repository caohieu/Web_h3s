<?php
if (isset($_GET['dangky']))
{
    include('../../db/ketnoi.php');
    $idCompany = $_GET['idCompany'];
    $idStudent = $_GET['idStudent'];
    $studentCode = $_GET['studentCode'];
    $count= mysqli_query($conn,"SELECT COUNT(*) FROM intern_organization_request_assignment");
    $id = mysqli_fetch_array($count)[0]+1;
    $query = mysqli_query($conn,"INSERT INTO `intern_organization_request_assignment` (`id`, `organization_request_id`, `student_id`, `start_date`, `end_date`, `status`, `create_date`) VALUES ('$id', '$idCompany', '$idStudent', '2019-12-02', '2019-12-02', '0', '2019-12-02')");
    if(!$query) {echo "Có lỗi xảy ra ";}else{echo "thanh cong";}
};
?>
<!DOCTYPE html>
<form action='../../login/student.php' method='GET'>
    <input style='display: none' name='usrname' value='<?php echo $studentCode ?>'>
    <input style='display: none' name='psw'>
    <input type='submit' value='Trở về' name='dangnhap'>
</form>