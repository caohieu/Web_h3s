<?php
$queryDanhSachs1 = mysqli_query($conn,"SELECT id,status,create_date,student_id,organization_request_id  FROM intern_organization_request_assignment WHERE status='1'");
if (mysqli_num_rows($queryDanhSachs1) != 0) {
    $rowDanhSachs1 = mysqli_fetch_all($queryDanhSachs1);
    for ($i=0;$i<mysqli_num_rows($queryDanhSachs1);$i++){
        $idRequestsAssignment[$i]=$rowDanhSachs1[$i][0];
        $statuss1[$i]=$rowDanhSachs1[$i][1];
        $create_dates1[$i]=$rowDanhSachs1[$i][2];
        $student_ids1[$i]=$rowDanhSachs1[$i][3];
        $idRequests1[$i]=$rowDanhSachs1[$i][4];
    }
}
for ($j=0;$j<mysqli_num_rows($queryDanhSachs1);$j++){
    $queryIdCompanys1 = mysqli_query($conn,"SELECT organization_id  FROM intern_organization_requests WHERE id='$idRequests1[$j]' ");
    if (mysqli_num_rows($queryIdCompanys1) != 0) {
        $rowIdCompanys1 = mysqli_fetch_array($queryIdCompanys1);
        $idCompanys1[$j] = $rowIdCompanys1["organization_id"];
    }
    $queryCompanys1 = mysqli_query($conn,"SELECT organization_name  FROM intern_organization_profile WHERE id='$idCompanys1[$j]'");
    if (mysqli_num_rows($queryCompanys1) != 0) {
        $rowcompanys1 = mysqli_fetch_array($queryCompanys1);
        $nameCompanys1[$j]=$rowcompanys1['organization_name'];
    }
    $queryStudents1 = mysqli_query($conn,"SELECT first_name,last_name  FROM intern_students WHERE id='$student_ids1[$j]'");
    if (mysqli_num_rows($queryStudents1) != 0) {
        $rowStudents1 = mysqli_fetch_array($queryStudents1);
        $firstNames1[$j] = $rowStudents1[0];
        $lastNames1[$j] = $rowStudents1[1];
    }
}

?>
<!DOCTYPE html>
<div id="scr_1003s1" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 800px ;display: none">
    <h1 class="w3-padding-32 w3-center">Danh sách đăng ký chưa xử lý</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 700px">
            <table>
                <tr>
                    <td>
                        <table border="1" width="700px">
                            <tr>
                                <th style="width: 20%">Tên công ty</th>
                                <th style="width: 25%">Tên học sinh</th>
                                <th style="width: 20%">Ngày đăng ký</th>
                                <th style="width: 20%">Trạng thái</th>
                                <th style="width: 15%">Duyệt</th>
                            </tr>
                            <?php
                            if(!empty($nameCompanys1[0])) include "../view/teacherRow/row1003s1/row1.php";
                            if(!empty($nameCompanys1[1])) include "../view/teacherRow/row1003s1/row2.php";
                            if(!empty($nameCompanys1[2])) include "../view/teacherRow/row1003s1/row3.php";
                            if(!empty($nameCompanys1[3])) include "../view/teacherRow/row1003s1/row4.php";
                            if(!empty($nameCompanys1[4])) include "../view/teacherRow/row1003s1/row5.php";
                            if(!empty($nameCompanys1[5])) include "../view/teacherRow/row1003s1/row6.php";
                            if(!empty($nameCompanys1[6])) include "../view/teacherRow/row1003s1/row7.php";
                            if(!empty($nameCompanys1[7])) include "../view/teacherRow/row1003s1/row8.php";
                            if(!empty($nameCompanys1[8])) include "../view/teacherRow/row1003s1/row9.php";
                            if(!empty($nameCompanys1[9])) include "../view/teacherRow/row1003s1/row10.php";
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
            <div>
                <input onclick="document.getElementById('scr_1003s1').style.display='none';document.getElementById('scr_1003s').style.display='block'" class="w3-button w3-green w3-section w3-center" type="submit" name="trove" style="width: 300px" value="Trở về">
            </div>
        </div>
    </div>
</div>