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
            $rowAssignment = mysqli_fetch_all($queryAssignment);
            for ($j=0;$j<mysqli_num_rows($queryAssignment);$j++){
                $arr[$j]=$rowAssignment[$j][0];
                $queryStudent = mysqli_query($conn,"SELECT first_name,last_name  FROM intern_students WHERE id='$arr[$j]'");
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
                            <?php
                            if(mysqli_num_rows($querycom) >= 1) include "../view/companyRow/btn1.php";
                            if(mysqli_num_rows($querycom) >= 2) include "../view/companyRow/btn2.php";
                            if(mysqli_num_rows($querycom) >= 3) include "../view/companyRow/btn3.php";
                            if(mysqli_num_rows($querycom) >= 4) include "../view/companyRow/btn4.php";
                            if(mysqli_num_rows($querycom) >= 5) include "../view/companyRow/btn5.php";
                            if(mysqli_num_rows($querycom) >= 6) include "../view/companyRow/btn6.php";
                            if(mysqli_num_rows($querycom) >= 7) include "../view/companyRow/btn7.php";
                            if(mysqli_num_rows($querycom) >= 8) include "../view/companyRow/btn8.php";
                            if(mysqli_num_rows($querycom) >= 9) include "../view/companyRow/btn9.php";
                            if(mysqli_num_rows($querycom) >= 10) include "../view/companyRow/btn10.php";

                            ?>
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
            <form action='../view/company/xuly.php' method='GET'>
            <div class="w3-half">
                <h5> Tên công ty : </h5>
                <h5> Mô tả (vị trí) : </h5>
                <h5> Số người cần tuyển : </h5>
                <!--<h5> Số người đã đăng ký : </h5>
                <h5> Số người đã được phân công : </h5>-->
                <!--<h5> Trạng thái : </h5>-->
            </div>
            <div class="w3-half">
                <h5 id="a"><?php echo $name; ?></h5>
                <input name="description" style="height: 35px" id="b">
                <input name="need" style="height: 35px" id="c">
                <!--<input name="dadk" style="height: 35px" id="d">
                <input name="daphancong" style="height: 35px" id="e">-->
                <!--<input name="tt" style="height: 35px" id="f">-->
                <input name="idRequests" style="display: none" id="g">
                <input style="display: none" name="companyCode" value='<?php echo $username?>'>
            </div>
                <input onclick="document.getElementById('scr_1002e').style.display='none'" class="w3-button w3-green w3-section w3-center" type="submit" name="suaphieu" style="width: 300px" value="Xac Nhan">


            </form>
            <input onclick="document.getElementById('scr_1002e').style.display='none';document.getElementById('scr_1002').style.display='block'" class="w3-button w3-green w3-section w3-center" type="submit" name="trove" style="width: 300px" value="Trở Về">
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
function a(){

    document.getElementById('b').value = '<?php if(!empty($short_description[0])) echo $short_description[0]; ?>';
    document.getElementById('c').value = '<?php if(!empty($amount[0])) echo $amount[0]; ?>';
    //document.getElementById('d').value = '<?php /*if(!empty($amount[0])) echo $amount[0]; */?>/*';*/
    //document.getElementById('e').value = '<?php /*if(!empty($amount[0])) echo $amount[0]; */?>/*';*/
    //document.getElementById('f').value = '<?php /*if(!empty($status2[0])) echo $status2[0]; */?>/*';*/
    document.getElementById('g').value = '<?php if(!empty($idRequest[0])) echo $idRequest[0]; ?>';

}
function b(){
    document.getElementById('b').value = '<?php if(!empty($short_description[1])) echo $short_description[1]; ?>';
    document.getElementById('c').value = '<?php if(!empty($amount[1])) echo $amount[1]; ?>';
    document.getElementById('g').value = '<?php if(!empty($idRequest[1])) echo $idRequest[1]; ?>';
}
function c(){
    document.getElementById('b').value = '<?php if(!empty($short_description[2])) echo $short_description[2]; ?>';
    document.getElementById('c').value = '<?php if(!empty($amount[2])) echo $amount[2]; ?>';
    document.getElementById('g').value = '<?php if(!empty($idRequest[2])) echo $idRequest[2]; ?>';

}
function d(){
    document.getElementById('b').value = '<?php if(!empty($short_description[3])) echo $short_description[3]; ?>';
    document.getElementById('c').value = '<?php if(!empty($amount[3])) echo $amount[3]; ?>';
    document.getElementById('g').value = '<?php if(!empty($idRequest[3])) echo $idRequest[3]; ?>';

}
function e(){
    document.getElementById('b').value = '<?php if(!empty($short_description[4])) echo $short_description[4]; ?>';
    document.getElementById('c').value = '<?php if(!empty($amount[4])) echo $amount[4]; ?>';
    document.getElementById('g').value = '<?php if(!empty($idRequest[4])) echo $idRequest[4]; ?>';

}
function g(){
    document.getElementById('b').value = '<?php if(!empty($short_description[5])) echo $short_description[5]; ?>';
    document.getElementById('c').value = '<?php if(!empty($amount[5])) echo $amount[5]; ?>';
    document.getElementById('g').value = '<?php if(!empty($idRequest[5])) echo $idRequest[5]; ?>';

}
function h(){
    document.getElementById('b').value = '<?php if(!empty($short_description[6])) echo $short_description[6]; ?>';
    document.getElementById('c').value = '<?php if(!empty($amount[6])) echo $amount[6]; ?>';
    document.getElementById('g').value = '<?php if(!empty($idRequest[6])) echo $idRequest[6]; ?>';

}
function i(){
    document.getElementById('b').value = '<?php if(!empty($short_description[7])) echo $short_description[7]; ?>';
    document.getElementById('c').value = '<?php if(!empty($amount[7])) echo $amount[7]; ?>';
    document.getElementById('g').value = '<?php if(!empty($idRequest[7])) echo $idRequest[7]; ?>';

}
function j(){
    document.getElementById('b').value = '<?php if(!empty($short_description[8])) echo $short_description[8]; ?>';
    document.getElementById('c').value = '<?php if(!empty($amount[8])) echo $amount[8]; ?>';
    document.getElementById('g').value = '<?php if(!empty($idRequest[1])) echo $idRequest[1]; ?>';

}
function k(){
    document.getElementById('b').value = '<?php if(!empty($short_description[9])) echo $short_description[9]; ?>';
    document.getElementById('c').value = '<?php if(!empty($amount[9])) echo $amount[9]; ?>';
    document.getElementById('g').value = '<?php if(!empty($idRequest[9])) echo $idRequest[9]; ?>';

}

function f1() {
    if (document.getElementById('scr_1002').style.display == 'block'){
        document.getElementById('scr_1002').style.display='none';
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
function d1(){
    if (document.getElementById('scr_1002s3').style.display == 'none'){
        document.getElementById('scr_1002s3').style.display='block';
    }
}
function e1(){
    if (document.getElementById('scr_1002s4').style.display == 'none'){
        document.getElementById('scr_1002s4').style.display='block';
    }
}
function g1(){
    if (document.getElementById('scr_1002s5').style.display == 'none'){
        document.getElementById('scr_1002s5').style.display='block';
    }
}
function h1(){
    if (document.getElementById('scr_1002s6').style.display == 'none'){
        document.getElementById('scr_1002s6').style.display='block';
    }
}
function i1(){
    if (document.getElementById('scr_1002s7').style.display == 'none'){
        document.getElementById('scr_1002s7').style.display='block';
    }
}
function j1(){
    if (document.getElementById('scr_1002s8').style.display == 'none'){
        document.getElementById('scr_1002s8').style.display='block';
    }
}
function k1(){
    if (document.getElementById('scr_1002s9').style.display == 'none'){
        document.getElementById('scr_1002s9').style.display='block';
    }
}
</script>