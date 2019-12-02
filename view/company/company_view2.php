<!DOCTYPE html>
<div id="scr_1002s0" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 800px ;display: none">
    <h1 class="w3-padding-32 w3-center">Danh sách SV đăng ký</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 700px">
            <table>
                <tr>
                    <td>
                        <table border="1" width="700px">
                            <tr>
                                <th style="width: 20%">Họ</th>
                                <th style="width: 20%">Tên</th>
                                <th style="width: 15%">Thông tin</th>
                            </tr>
                            <?php
                            if(!empty($firstName[0][0])) include "../view/companyRow/row/row1_1.php";
                            if(!empty($firstName[0][1])) include "../view/companyRow/row/row1_2.php";
                            if(!empty($firstName[0][2])) include "../view/companyRow/row/row1_3.php";
                            if(!empty($firstName[0][3])) include "../view/companyRow/row/row1_4.php";
                            if(!empty($firstName[0][4])) include "../view/companyRow/row/row1_5.php";
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
            <div>
                <input onclick="document.getElementById('scr_1002s0').style.display='none';document.getElementById('scr_1002').style.display='block'" class="w3-button w3-green w3-section w3-center" type="submit" name="trove" style="width: 300px" value="Trở Về">
            </div>
        </div>
    </div>
</div>
<div id="scr_1002s1" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 800px ;display: none">
    <h1 class="w3-padding-32 w3-center">Danh sách SV đăng ký</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 700px">
            <table>
                <tr>
                    <td>
                        <table border="1" width="700px">
                            <tr>
                                <th style="width: 20%">Họ</th>
                                <th style="width: 20%">Tên</th>
                                <th style="width: 15%">Thông tin</th>
                            </tr>
                            <?php if(!empty($firstName[1][0])) include "../view/companyRow/row/row2_1.php"?>
                            <?php if(!empty($firstName[1][1])) include "../view/companyRow/row/row2_2.php"?>
                            <?php if(!empty($firstName[1][2])) include "../view/companyRow/row/row2_3.php"?>
                            <?php if(!empty($firstName[1][3])) include "../view/companyRow/row/row2_4.php"?>
                            <?php if(!empty($firstName[1][4])) include "../view/companyRow/row/row2_5.php"?>
                        </table>
                    </td>
                </tr>
            </table>
            <div>
                <input onclick="document.getElementById('scr_1002s1').style.display='none';document.getElementById('scr_1002').style.display='block'" class="w3-button w3-green w3-section w3-center" type="submit" name="trove" style="width: 300px" value="Trở Về">
            </div>
        </div>
    </div>
</div>
<div id="scr_1002s2" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 800px ;display: none">
    <h1 class="w3-padding-32 w3-center">Danh sách SV đăng ký</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 700px">
            <table>
                <tr>
                    <td>
                        <table border="1" width="700px">
                            <tr>
                                <th style="width: 20%">Họ</th>
                                <th style="width: 20%">Tên</th>
                                <th style="width: 15%">Thông tin</th>
                            </tr>
                            <?php
                            if(!empty($firstName[2][0])) include "../view/companyRow/row/row3_1.php";
                            if(!empty($firstName[2][1])) include "../view/companyRow/row/row3_2.php";
                            if(!empty($firstName[2][2])) include "../view/companyRow/row/row3_3.php";
                            if(!empty($firstName[2][3])) include "../view/companyRow/row/row3_4.php";
                            if(!empty($firstName[2][4])) include "../view/companyRow/row/row3_5.php";
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
            <div>
                <input onclick="document.getElementById('scr_1002s2').style.display='none';document.getElementById('scr_1002').style.display='block'" class="w3-button w3-green w3-section w3-center" type="submit" name="trove" style="width: 300px" value="Trở Về">
            </div>
        </div>
    </div>
</div>
