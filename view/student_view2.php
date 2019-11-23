<?php
$querystu2 = mysqli_query($conn,"SELECT organization_id,status,short_description,amount  FROM intern_organization_requests ");
if (mysqli_num_rows($querystu2) != 0) {
    $rowstu2 = mysqli_fetch_all($querystu2);
    for ($i=0;$i<mysqli_num_rows($querystu2);$i++){
        $idcty2[$i]=$rowstu2[$i][0];
        $status2[]=$rowstu2[$i][1];
        $short_description[$i]=$rowstu2[$i][2];
        $amount[$i]=$rowstu2[$i][3];
    }


}
for ($i=0;$i<mysqli_num_rows($querystu2);$i++) {
    $queryctyname2 = mysqli_query($conn, "SELECT organization_name  FROM intern_organization_profile WHERE id='$idcty2[$i]'");
    if (mysqli_num_rows($queryctyname2) != 0) {
        $rowctynam2 = mysqli_fetch_array($queryctyname2);
        $namecty2[$i] = $rowctynam2['organization_name'];
    }
}
?>
<!DOCTYPE html>
<div id="scr_1001b" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 800px;display: none">
    <h1 class="w3-padding-32 w3-center">Danh sach cong ty</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 700px">
            <table>
                <tr>
                <td>
                    <table border="1" width="700px">
                        <tr>
                            <th style="width: 20%">Ten cong ty</th>
                            <th style="width: 20%">mo ta</th>
                            <th style="width: 15%">so nguoi can tuyen</th>
                            <th style="width: 15%">so nguoi da dang ky</th>
                            <th style="width: 15%">trang thai</th>
                            <th style="width: 15%">Dang ky</th>
                        </tr>
                        <tr>
                            <th><?php echo $namecty2[0]?></th>
                            <th><?php echo $short_description[0]?></th>
                            <th><?php echo $amount[0]?></th>
                            <th><?php echo $amount[0]?></th>
                            <th><?php echo $status2[0]?></th>
                            <th><button onclick="f(); a()" class="w3-light-grey">chi tiet</button></th>
                        </tr>
                        <?php if(mysqli_num_rows($querystu2) >= 2) include "btn2.php"?>
                        <?php if(mysqli_num_rows($querystu2) >= 3) include "btn3.php"?>
                   </table>
                </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div id="scr_1001c" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 600px;display: none">
    <h1 class="w3-padding-32 w3-center">PHIẾU ĐĂNG KÝ</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 500px">
            <div class="w3-half">
                <h5> Tên công ty : </h5>
                <h5> Mo ta : </h5>
                <h5> So ng can tuyen : </h5>
                <h5> So ng da dang ky : </h5>
                <h5> So ng da duoc phan cong : </h5>
                <h5> Trạng thái :  </h5>
            </div>
            <div class="w3-half">
                <h5 id="a"></h5>
                <h5 id="b"></h5>
                <h5 id="c"></h5>
                <h5 id="d"></h5>
                <h5 id="e"></h5>
                <h5 id="f"></h5>
            </div>
            <div >
                <input onclick="document.getElementById('scr_1001c').style.display='none'" class="w3-button w3-green w3-section w3-center" type="submit" name="dangky" style="width: 300px" value="Đăng ký">
                <input onclick="document.getElementById('scr_1001c').style.display='none';document.getElementById('scr_1001b').style.display='block'" class="w3-button w3-green w3-section w3-center" type="submit" name="trove" style="width: 300px" value="Trở về">
            </div>

        </div>
    </div>
</div>

<script>
    var namecongty,mota,cantuyen,dadk,dkpc,tt;
    function f() {
        if (document.getElementById('scr_1001b').style.display == 'block'){
            document.getElementById('scr_1001b').style.display='none';
            document.getElementById('scr_1001c').style.display='block'
        }
    }
    function a(){
        namecongty = '<?php echo $namecty2[0]; ?>';
        mota= '<?php echo $short_description[0]; ?>';
        cantuyen= '<?php echo $amount[0]; ?>';
        dadk= '<?php echo $amount[0]; ?>';
        dkpc= '<?php echo $amount[0]; ?>';
        tt= '<?php echo $status2[0]; ?>';
        document.getElementById('a').innerHTML = namecongty;
        document.getElementById('b').innerHTML = mota;
        document.getElementById('c').innerHTML = cantuyen;
        document.getElementById('d').innerHTML = dadk;
        document.getElementById('e').innerHTML = dkpc;
        document.getElementById('f').innerHTML = tt;
    }
    function b(){
        namecongty = '<?php echo $namecty2[1]; ?>';
        mota= '<?php echo $short_description[1]; ?>';
        cantuyen= '<?php echo $amount[1]; ?>';
        dadk= '<?php echo $amount[1]; ?>';
        dkpc= '<?php echo $amount[1]; ?>';
        tt= '<?php echo $status2[1]; ?>';
        document.getElementById('a').innerHTML = namecongty;
        document.getElementById('b').innerHTML = mota;
        document.getElementById('c').innerHTML = cantuyen;
        document.getElementById('d').innerHTML = dadk;
        document.getElementById('e').innerHTML = dkpc;
        document.getElementById('f').innerHTML = tt;
    }
    function c(){
        namecongty = '<?php echo $namecty2[2]; ?>';
        mota= '<?php echo $short_description[2]; ?>';
        cantuyen= '<?php echo $amount[2]; ?>';
        dadk= '<?php echo $amount[2]; ?>';
        dkpc= '<?php echo $amount[2]; ?>';
        tt= '<?php echo $status2[2]; ?>';
        document.getElementById('a').innerHTML = namecongty;
        document.getElementById('b').innerHTML = mota;
        document.getElementById('c').innerHTML = cantuyen;
        document.getElementById('d').innerHTML = dadk;
        document.getElementById('e').innerHTML = dkpc;
        document.getElementById('f').innerHTML = tt;
    }
</script>