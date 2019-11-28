<?php
$querycom = mysqli_query($conn,"SELECT organization_id,status,short_description,amount,id  FROM intern_organization_requests WHERE organization_id='$idcty' ");
if (mysqli_num_rows($querycom) != 0) {
    $rowcom = mysqli_fetch_all($querycom);
    for ($i=0;$i<mysqli_num_rows($querycom);$i++){
        $idcty2[$i]=$rowcom[$i][0];
        $status2[$i]=$rowcom[$i][1];
        $short_description[$i]=$rowcom[$i][2];
        $amount[$i]=$rowcom[$i][3];
        $idRequest[$i]=$rowcom[$i][4];
        $queryAssignment = mysqli_query($conn,"SELECT student_id  FROM intern_organization_request_assignment WHERE organization_request_id='$idRequest[$i]'");
        if (mysqli_num_rows($queryAssignment) != 0) {
            $rowAssignment = mysqli_fetch_array($queryAssignment);
            for ($j=0;$j<mysqli_num_rows($queryAssignment);$j++){
                $queryStudent = mysqli_query($conn,"SELECT first_name,last_name  FROM intern_students WHERE id='$rowAssignment[$j]'");
                if (mysqli_num_rows($queryStudent) != 0) {
                    $rowStudent = mysqli_fetch_array($queryStudent);
                    $firstName[$i][$j] = $rowStudent[0];
                    $lastName[$i][$j] = $rowStudent[1];
                }
            }
        }
    }
}



?>
<!DOCTYPE html>
<div id="scr_1002" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 800px ;display: none">
    <h1 class="w3-padding-32 w3-center">Danh sách phiếu của công ty</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 700px">
            <table>
                <tr>
                    <td>
                        <table border="1" width="700px">
                            <tr>
                                <th style="width: 20%">Ten cong ty</th>
                                <th style="width: 20%">Mô tả (vị trí)</th>
                                <th style="width: 15%">so nguoi can tuyen</th>
                                <th style="width: 15%">so nguoi da dang ky</th>
                                <th style="width: 15%">trang thai</th>
                                <th style="width: 15%">Sua</th>
                                <th style="width: 15%">Danh sách</th>
                            </tr>
                            <tr>
                                <th><?php echo $name?></th>
                                <th><?php echo $short_description[0]?></th>
                                <th><?php echo $amount[0]?></th>
                                <th><?php echo $amount[0]?></th>
                                <th><?php echo $status2[0]?></th>
                                <th><button onclick="f();a()" class="w3-light-grey">Sua</button></th>
                                <th><button onclick="f1();a1()" class="w3-light-grey">Danh sách</button></th>
                            </tr>
                            <?php if(mysqli_num_rows($querycom) >= 2) include "companyRow/btn2.php"?>
                            <?php if(mysqli_num_rows($querycom) >= 3) include "companyRow/btn3.php"?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div id="scr_1002e" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 600px;display: none">
    <h1 class="w3-padding-32 w3-center">SỬA PHIẾU ĐĂNG KÝ</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 500px">
            <div class="w3-half">
                <h5> Tên công ty : </h5>
                <h5> Mô tả (vị trí) : </h5>
                <h5> Số người cần tuyển : </h5>
                <h5> Số người đã đăng ký : </h5>
                <h5> Số người đã được phân công : </h5>
                <h5> Trạng thái : </h5>
            </div>
            <div class="w3-half">
                <h5 id="a"><?php echo $name; ?></h5>
                <input style="height: 35px" id="b">
                <input style="height: 35px" id="c">
                <input style="height: 35px" id="d">
                <input style="height: 35px" id="e">
                <input style="height: 35px" id="f">
            </div>
            <div>
                <input onclick="document.getElementById('scr_1002e').style.display='none'" class="w3-button w3-green w3-section w3-center" type="submit" name="dangky" style="width: 300px" value="Xac Nhan">
                <input onclick="document.getElementById('scr_1002e').style.display='none';document.getElementById('scr_1002').style.display='block'" class="w3-button w3-green w3-section w3-center" type="submit" name="trove" style="width: 300px" value="Trở Về">
            </div>

        </div>
    </div>
</div>

<script>
function f() {
    if (document.getElementById('scr_1002').style.display == 'block'){
        document.getElementById('scr_1002').style.display='none';
        document.getElementById('scr_1002e').style.display='block'
    }
}
var namecongty,mota,cantuyen,dadk,dkpc,tt;

function a(){
    mota= '<?php echo $short_description[0]; ?>';
    cantuyen= '<?php echo $amount[0]; ?>';
    dadk= '<?php echo $amount[0]; ?>';
    dkpc= '<?php echo $amount[0]; ?>';
    tt= '<?php echo $status2[0]; ?>';
    document.getElementById('b').value  = mota;
    document.getElementById('c').value  = cantuyen;
    document.getElementById('d').value  = dadk;
    document.getElementById('e').value  = dkpc;
    document.getElementById('f').value  = tt;
}
function b(){
    mota= '<?php if(!empty($short_description[1])) echo $short_description[1]; ?>';
    cantuyen= '<?php if(!empty($amount[1])) echo $amount[1]; ?>';
    dadk= '<?php if(!empty($amount[1])) echo $amount[1]; ?>';
    dkpc= '<?php if(!empty($amount[1])) echo $amount[1]; ?>';
    tt= '<?php if(!empty($status2[1])) echo $status2[1]; ?>';
    document.getElementById('b').value = mota;
    document.getElementById('c').value = cantuyen;
    document.getElementById('d').value = dadk;
    document.getElementById('e').value = dkpc;
    document.getElementById('f').value = tt;
}
function c(){
    mota= '<?php if(!empty($short_description[2])) echo $short_description[2]; ?>';
    cantuyen= '<?php if(!empty($amount[2])) echo $amount[2]; ?>';
    dadk= '<?php if(!empty($amount[2])) echo $amount[2]; ?>';
    dkpc= '<?php if(!empty($amount[2])) echo $amount[2]; ?>';
    tt= '<?php if(!empty($status2[2])) echo $status2[2]; ?>';
    document.getElementById('b').value  = mota;
    document.getElementById('c').value  = cantuyen;
    document.getElementById('d').value  = dadk;
    document.getElementById('e').value  = dkpc;
    document.getElementById('f').value  = tt;

}

function f1() {
    if (document.getElementById('scr_1002').style.display == 'block'){
        document.getElementById('scr_1002').style.display='none';
        //document.getElementById('scr_1002e').style.display='block'
    }
}
function a1(){
    if (document.getElementById('scr_1002s0').style.display == 'none'){
        document.getElementById('scr_1002s0').style.display='block';
    }

}
function b1(){
    if (document.getElementById('scr_1002s1').style.display == 'none'){
        document.getElementById('scr_1002s1').style.display='block';
    }
}
function c1(){
    if (document.getElementById('scr_1002s2').style.display == 'none'){
        document.getElementById('scr_1002s2').style.display='block';
    }
}
</script>