<?php
$queryDanhSachPhieuv1 = mysqli_query($conn,"SELECT organization_id,status,short_description,amount,date_submitted,id  FROM intern_organization_requests where status='0'");
if (mysqli_num_rows($queryDanhSachPhieuv1) != 0) {
    $rowDanhSachPhieuv1 = mysqli_fetch_all($queryDanhSachPhieuv1);
    for ($i=0;$i<mysqli_num_rows($queryDanhSachPhieuv1);$i++){
        $idCompanyPhieuv1[$i]=$rowDanhSachPhieuv1[$i][0];
        $statusv1[$i]=$rowDanhSachPhieuv1[$i][1];
        $short_descriptionv1[$i]=$rowDanhSachPhieuv1[$i][2];
        $amountv1[$i]=$rowDanhSachPhieuv1[$i][3];
        $date_submittedv1[$i]=$rowDanhSachPhieuv1[$i][4];
        $idRequestsv1[$i]=$rowDanhSachPhieuv1[$i][5];

    }
}
for ($j=0;$j<mysqli_num_rows($queryDanhSachPhieuv1);$j++){
    $queryCompanyv1 = mysqli_query($conn,"SELECT organization_name  FROM intern_organization_profile WHERE id='$idCompanyPhieuv1[$j]'");
    if (mysqli_num_rows($queryCompanyv1) != 0) {
        $rowcompanyv1 = mysqli_fetch_array($queryCompanyv1);
        $nameCompanyv1[$j]=$rowcompanyv1['organization_name'];
    }
}

?>
<!DOCTYPE html>
<div id="scr_1003v1" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 800px ;display: none">
    <h1 class="w3-padding-32 w3-center">Danh sách phiếu chưa duyệt</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 700px">
            <table>
                <tr>
                    <td>
                        <table border="1" width="700px">
                            <tr>
                                <th style="width: 10%">Tên công ty</th>
                                <th style="width: 25%">Chi tiết</th>
                                <th style="width: 15%">Số lượng cần tuyển</th>
                                <th style="width: 20%">Ngày đăng ký</th>
                                <th style="width: 15%">Trạng thái</th>
                                <th style="width: 15%">Duyệt</th>
                            </tr>
                            <?php
                            if(!empty($nameCompanyv1[0])) include "../view/teacherRow/row1003v1/row1.php";
                            if(!empty($nameCompanyv1[1])) include "../view/teacherRow/row1003v1/row2.php";
                            if(!empty($nameCompanyv1[2])) include "../view/teacherRow/row1003v1/row3.php";
                            if(!empty($nameCompanyv1[3])) include "../view/teacherRow/row1003v1/row4.php";
                            if(!empty($nameCompanyv1[4])) include "../view/teacherRow/row1003v1/row5.php";
                            if(!empty($nameCompanyv1[5])) include "../view/teacherRow/row1003v1/row6.php";
                            if(!empty($nameCompanyv1[6])) include "../view/teacherRow/row1003v1/row7.php";
                            if(!empty($nameCompanyv1[7])) include "../view/teacherRow/row1003v1/row8.php";
                            if(!empty($nameCompanyv1[8])) include "../view/teacherRow/row1003v1/row9.php";
                            if(!empty($nameCompanyv1[9])) include "../view/teacherRow/row1003v1/row10.php"?>
                        </table>
                    </td>
                </tr>
            </table>
            <div>
                <input onclick="document.getElementById('scr_1003v1').style.display='none';document.getElementById('scr_1003v').style.display='block'" class="w3-button w3-green w3-section w3-center" type="submit" name="duyetphieu" style="width: 300px" value="Trở về">
            </div>
        </div>
    </div>
</div>