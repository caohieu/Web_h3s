<?php
$queryDanhSach = mysqli_query($conn,"SELECT organization_request_id,status,create_date,student_id  FROM intern_organization_request_assignment WHERE status='2'");
if (mysqli_num_rows($queryDanhSach) != 0) {
    $rowDanhSach = mysqli_fetch_all($queryDanhSach);
    for ($i=0;$i<mysqli_num_rows($queryDanhSach);$i++){
        $idRequest[$i]=$rowDanhSach[$i][0];
        $status[$i]=$rowDanhSach[$i][1];
        $create_date[$i]=$rowDanhSach[$i][2];
        $student_id[$i]=$rowDanhSach[$i][3];
    }
}
for ($j=0;$j<mysqli_num_rows($queryDanhSach);$j++){
    $queryIdCompany = mysqli_query($conn,"SELECT organization_id  FROM intern_organization_requests WHERE id='$idRequest[$j]' ");
    if (mysqli_num_rows($queryIdCompany) != 0) {
        $rowIdCompany = mysqli_fetch_array($queryIdCompany);
        $idCompany[$j] = $rowIdCompany["organization_id"];
    }
    $queryCompany = mysqli_query($conn,"SELECT organization_name  FROM intern_organization_profile WHERE id='$idCompany[$j]'");
    if (mysqli_num_rows($queryCompany) != 0) {
        $rowcompany = mysqli_fetch_array($queryCompany);
        $nameCompany[$j]=$rowcompany['organization_name'];
    }
    $queryStudent = mysqli_query($conn,"SELECT first_name,last_name  FROM intern_students WHERE id='$student_id[$j]'");
    if (mysqli_num_rows($queryStudent) != 0) {
        $rowStudent = mysqli_fetch_array($queryStudent);
        $firstName[$j] = $rowStudent[0];
        $lastName[$j] = $rowStudent[1];
    }
}

?>
<!DOCTYPE html>
<div id="scr_1003s" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 800px ;display: none">
    <h1 class="w3-padding-32 w3-center">Danh sách đăng ký đã xử lý</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 700px">
            <table>
                <tr>
                    <td>
                        <table border="1" width="700px">
                            <tr>
                                <th style="width: 20%">Tên công ty</th>
                                <th style="width: 30%">Tên học sinh</th>
                                <th style="width: 25%">Ngày đăng ký</th>
                                <th style="width: 25%">Trạng thái</th>
                            </tr>
                            <?php
                            if(!empty($nameCompany[0])) include "../view/teacherRow/row1003s/row1.php";
                            if(!empty($nameCompany[1])) include "../view/teacherRow/row1003s/row2.php";
                            if(!empty($nameCompany[2])) include "../view/teacherRow/row1003s/row3.php";
                            if(!empty($nameCompany[3])) include "../view/teacherRow/row1003s/row4.php";
                            if(!empty($nameCompany[4])) include "../view/teacherRow/row1003s/row5.php";
                            if(!empty($nameCompany[5])) include "../view/teacherRow/row1003s/row6.php";
                            if(!empty($nameCompany[6])) include "../view/teacherRow/row1003s/row7.php";
                            if(!empty($nameCompany[7])) include "../view/teacherRow/row1003s/row8.php";
                            if(!empty($nameCompany[8])) include "../view/teacherRow/row1003s/row9.php";
                            if(!empty($nameCompany[9])) include "../view/teacherRow/row1003s/row10.php"?>
                        </table>
                    </td>
                </tr>
            </table>
            <div>
                <input onclick="document.getElementById('scr_1003s').style.display='none';document.getElementById('scr_1003s1').style.display='block'" class="w3-button w3-green w3-section w3-center" type="submit" name="duyetphieu" style="width: 300px" value="Duyệt phiếu">
                <input onclick="document.getElementById('scr_1003s').style.display='none'" class="w3-button w3-green w3-section w3-center" type="submit" name="phancong" style="width: 300px" value="Phân công">
            </div>
        </div>
    </div>
</div>