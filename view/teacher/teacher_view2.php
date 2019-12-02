<?php
$queryDanhSachPhieu = mysqli_query($conn,"SELECT organization_id,status,short_description,amount,date_submitted,id  FROM intern_organization_requests where status='1'");
if (mysqli_num_rows($queryDanhSachPhieu) != 0) {
    $rowDanhSachPhieu = mysqli_fetch_all($queryDanhSachPhieu);
    for ($i=0;$i<mysqli_num_rows($queryDanhSachPhieu);$i++){
            $idCompanyPhieu[$i]=$rowDanhSachPhieu[$i][0];
            $status[$i]=$rowDanhSachPhieu[$i][1];
            $short_description[$i]=$rowDanhSachPhieu[$i][2];
            $amount[$i]=$rowDanhSachPhieu[$i][3];
            $date_submitted[$i]=$rowDanhSachPhieu[$i][4];

    }
}
for ($j=0;$j<mysqli_num_rows($queryDanhSachPhieu);$j++){
    $queryCompanyv = mysqli_query($conn,"SELECT organization_name  FROM intern_organization_profile WHERE id='$idCompanyPhieu[$j]'");
    if (mysqli_num_rows($queryCompanyv) != 0) {
        $rowcompanyv = mysqli_fetch_array($queryCompanyv);
        $nameCompanyv[$j]=$rowcompanyv['organization_name'];
    }
}

?>
<!DOCTYPE html>
<div id="scr_1003v" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 800px ;display: none">
    <h1 class="w3-padding-32 w3-center">Danh sách phiếu đã duyệt</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 700px">
            <table>
                <tr>
                    <td>
                        <table border="1" width="700px">
                            <tr>
                                <th style="width: 15%">Tên công ty</th>
                                <th style="width: 30%">Chi tiết</th>
                                <th style="width: 15%">Số lượng cần tuyển</th>
                                <th style="width: 20%">Ngày đăng ký</th>
                                <th style="width: 20%">Trạng thái</th>
                            </tr>
                            <?php
                            if(!empty($nameCompanyv[0])) include "../view/teacherRow/row1003v/row1.php";
                            if(!empty($nameCompanyv[1])) include "../view/teacherRow/row1003v/row2.php";
                            if(!empty($nameCompanyv[2])) include "../view/teacherRow/row1003v/row3.php";
                            if(!empty($nameCompanyv[3])) include "../view/teacherRow/row1003v/row4.php";
                            if(!empty($nameCompanyv[4])) include "../view/teacherRow/row1003v/row5.php";
                            if(!empty($nameCompanyv[5])) include "../view/teacherRow/row1003v/row6.php";
                            if(!empty($nameCompanyv[6])) include "../view/teacherRow/row1003v/row7.php";
                            if(!empty($nameCompanyv[7])) include "../view/teacherRow/row1003v/row8.php";
                            if(!empty($nameCompanyv[8])) include "../view/teacherRow/row1003v/row9.php";
                            if(!empty($nameCompanyv[9])) include "../view/teacherRow/row1003v/row10.php"
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
            <div>
                <input onclick="document.getElementById('scr_1003v').style.display='none';document.getElementById('scr_1003v1').style.display='block'" class="w3-button w3-green w3-section w3-center" type="submit" name="duyetphieu" style="width: 300px" value="Duyệt phiếu">
            </div>
        </div>
    </div>
</div>