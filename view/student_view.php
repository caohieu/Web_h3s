<?php
$querystu = mysqli_query($conn,"SELECT organization_request_id,status,create_date,id  FROM intern_organization_request_assignment WHERE student_id='$studentId'");
if (mysqli_num_rows($querystu) != 0) {
    $rowstu = mysqli_fetch_all($querystu);
    for ($i=0;$i<mysqli_num_rows($querystu);$i++){
        if($rowstu[$i][1]==0){
            $idRequest=$rowstu[$i][0];
            $status=$rowstu[$i][1];
            $create_date=$rowstu[$i][2];
            $assignmentId=$rowstu[$i][3];
            break;
        }
    }
}
$queryRequestName = mysqli_query($conn,"SELECT organization_id  FROM intern_organization_requests WHERE id='$idRequest'");
if (mysqli_num_rows($queryRequestName) != 0) {
    $rowRequestName = mysqli_fetch_array($queryRequestName);
    $idCompany=$rowRequestName['organization_id'];
}
$queryCompanyname = mysqli_query($conn,"SELECT organization_name  FROM intern_organization_profile WHERE id='$idCompany'");
if (mysqli_num_rows($queryCompanyname) != 0) {
    $rowCompanyName = mysqli_fetch_array($queryCompanyname);
    $nameCompany=$rowCompanyName['organization_name'];
}
?>
<!DOCTYPE html>
<div id="scr_1001a" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 600px ;display: none">
    <h1 class="w3-padding-32 w3-center">PHIẾU ĐĂNG KÝ</h1>
    <div class="w3-center">
        <form action='../view/xuly.php' method='GET'>
        <div class="w3-content"style="width: 500px">
            <div class="w3-half">
                <h5> Sinh viên : </h5>
                <h5> Tên công ty : </h5>
                <h5> Ngày bắt đầu : </h5>
                <h5> Ngày kết thúc : </h5>
                <h5> Ngày thêm : </h5>
                <h5> Trạng thái :  </h5>
            </div>
            <div class="w3-half">
                <h5><?php echo $name?></h5>
                <h5><?php echo $nameCompany?></h5>
                <input style="height: 35px" name="startdate">
                <input style="height: 35px" name="enddate">
                <h5><?php echo $create_date?></h5>
                <input style="height: 35px" name="stt" value="<?php echo $status ?>">
                <input style="display: none" name="assignmentId" value="<?php echo $assignmentId ?>">
            </div>
            <input onclick="document.getElementById('scr_1001a').style.display='none'" class="w3-button w3-green w3-section w3-center" type="submit" name="xacnhan" style="width: 300px" value="Xác nhận">
        </div>
        </form>
    </div>
</div>