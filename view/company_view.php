<?php
$querycom = mysqli_query($conn,"SELECT organization_id,status,short_description,amount  FROM intern_organization_requests WHERE organization_id='$idcty' ");
if (mysqli_num_rows($querycom) != 0) {
    $rowstu2 = mysqli_fetch_all($querycom);
    for ($i=0;$i<mysqli_num_rows($querycom);$i++){
        $idcty2[$i]=$rowstu2[$i][0];
        $status2[]=$rowstu2[$i][1];
        $short_description[$i]=$rowstu2[$i][2];
        $amount[$i]=$rowstu2[$i][3];
    }
} ?>
<!DOCTYPE html>
<div id="scr_1002" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 800px ;display: block">
    <h1 class="w3-padding-32 w3-center">Danh sach phieu cua cong ty</h1>
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
                                <th style="width: 15%">Sua</th>
                            </tr>
                            <tr>
                                <th><?php echo $name?></th>
                                <th><?php echo $short_description[0]?></th>
                                <th><?php echo $amount[0]?></th>
                                <th><?php echo $amount[0]?></th>
                                <th><?php echo $status2[0]?></th>
                                <th><button onclick="f();a()" class="w3-light-grey">Sua</button></th>
                            </tr>
                            <?php if(mysqli_num_rows($querycom) >= 2) include "btn2.php"?>
                            <?php if(mysqli_num_rows($querycom) >= 3) include "btn3.php"?>
                        </table>
                    </td>
                </tr>
            </table>
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
        namecongty = '<?php echo $name; ?>';
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
        namecongty = '<?php  echo $name; ?>';
        mota= '<?php if(!empty($short_description[1])) echo $short_description[1]; ?>';
        cantuyen= '<?php if(!empty($amount[1])) echo $amount[1]; ?>';
        dadk= '<?php if(!empty($amount[1])) echo $amount[1]; ?>';
        dkpc= '<?php if(!empty($amount[1])) echo $amount[1]; ?>';
        tt= '<?php if(!empty($status2[1])) echo $status2[1]; ?>';
        document.getElementById('a').innerHTML = namecongty;
        document.getElementById('b').innerHTML = mota;
        document.getElementById('c').innerHTML = cantuyen;
        document.getElementById('d').innerHTML = dadk;
        document.getElementById('e').innerHTML = dkpc;
        document.getElementById('f').innerHTML = tt;
    }
    function c(){
        namecongty = '<?php echo $name; ?>';
        mota= '<?php if(!empty($short_description[2])) echo $short_description[2]; ?>';
        cantuyen= '<?php if(!empty($amount[2])) echo $amount[2]; ?>';
        dadk= '<?php if(!empty($amount[2])) echo $amount[2]; ?>';
        dkpc= '<?php if(!empty($amount[2])) echo $amount[2]; ?>';
        tt= '<?php if(!empty($status2[2])) echo $status2[2]; ?>';
        document.getElementById('a').innerHTML = namecongty;
        document.getElementById('b').innerHTML = mota;
        document.getElementById('c').innerHTML = cantuyen;
        document.getElementById('d').innerHTML = dadk;
        document.getElementById('e').innerHTML = dkpc;
        document.getElementById('f').innerHTML = tt;

    }
</script>
<div id="scr_1002e" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 600px;display: none">
    <h1 class="w3-padding-32 w3-center">SUA PHIẾU ĐĂNG KÝ</h1>
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
                <input id="b">
                <input id="c">
                <input id="d">
                <input id="e">
                <input id="f">
            </div>
            <div>
                <input onclick="document.getElementById('scr_1002e').style.display='none'" class="w3-button w3-green w3-section w3-center" type="submit" name="dangky" style="width: 300px" value="Xac Nhan">
                <input onclick="document.getElementById('scr_1002e').style.display='none';document.getElementById('scr_1002').style.display='block'" class="w3-button w3-green w3-section w3-center" type="submit" name="trove" style="width: 300px" value="Trở Về">
            </div>

        </div>
    </div>
</div>
