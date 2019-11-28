<?php
$querystu = mysqli_query($conn,"SELECT organization_request_id,status,create_date  FROM intern_organization_request_assignment WHERE student_id='$studentId'");
if (mysqli_num_rows($querystu) != 0) {
    $rowstu = mysqli_fetch_all($querystu);
    for ($i=0;$i<mysqli_num_rows($querystu);$i++){
        if($rowstu[$i][1]==0){
            $idcty=$rowstu[$i][0];
            $status=$rowstu[$i][1];
            $create_date=$rowstu[$i][2];
            break;
        }
    }
}
$queryctyname = mysqli_query($conn,"SELECT organization_name  FROM intern_organization_profile WHERE id='$idcty'");
if (mysqli_num_rows($queryctyname) != 0) {
    $rowctynam = mysqli_fetch_array($queryctyname);
    $namecty=$rowctynam['organization_name'];
}
?>
<!DOCTYPE html>
<div id="scr_1001a" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 600px ;display: none">
    <h1 class="w3-padding-32 w3-center">PHIẾU ĐĂNG KÝ</h1>
    <div class="w3-center">
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
                <h5><?php echo $namecty?></h5>
                <h5><input></h5>
                <h5><input></h5>
                <h5><?php echo $create_date?></h5>
                <input value="<?php echo $status ?>">
            </div>
            <div >
                <input onclick="document.getElementById('scr_1001a').style.display='none'" class="w3-button w3-green w3-section w3-center" type="submit" name="xacnhan" style="width: 300px" value="Xác nhận">
            </div>
        </div>
    </div>
</div>