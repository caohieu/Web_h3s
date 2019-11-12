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
                            <th style="width: 20%">   Ten cong ty  </th>
                            <th style="width: 20%">       mo ta    </th>
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
                            <th><button class="w3-light-grey">dangky</button></th>
                        </tr>
                        <tr>
                            <th><?php if(mysqli_num_rows($querystu2) >= 2)echo $namecty2[1]?></th>
                            <th><?php if(mysqli_num_rows($querystu2) >= 2)echo $short_description[1]?></th>
                            <th><?php if(mysqli_num_rows($querystu2) >= 2)echo $amount[1]?></th>
                            <th><?php if(mysqli_num_rows($querystu2) >= 2)echo $amount[1]?></th>
                            <th><?php if(mysqli_num_rows($querystu2) >= 2)echo $status2[1]?></th>
                            <th><button class="w3-light-grey">dangky</button></th>
                        </tr>
                        <tr>
                            <th><?php if(mysqli_num_rows($querystu2) >= 3)echo $namecty2[2]?></th>
                            <th><?php if(mysqli_num_rows($querystu2) >= 3)echo $short_description[2]?></th>
                            <th><?php if(mysqli_num_rows($querystu2) >= 3)echo $amount[2]?></th>
                            <th><?php if(mysqli_num_rows($querystu2) >= 3)echo $amount[2]?></th>
                            <th><?php if(mysqli_num_rows($querystu2) >= 3)echo $status2[2]?></th>
                            <th><button class="w3-light-grey">dangky</button></th>
                        </tr>
                   </table>
                </td>
                </tr>
            </table>
        </div>
    </div>
</div>