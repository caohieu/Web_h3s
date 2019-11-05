<!DOCTYPE html>
<header class="w3-container w3-red w3-center" style="padding:128px 16px;height: 500px">
    <h2 class="w3-margin w3-jumbo">VIẾT CV NGAY - NHẬN VIỆC LIỀN TAY</h2>
    <p class="w3-xlarge">Đăng nhập và tạo hồ sơ</p>
    <div class="w3-dropdown-hover">
        <button onclick="document.getElementById('scr').style.display='block'" class="w3-button w3-black">Đăng nhập</button>
        <div style="height:50px"></div>
        <div id="scr" class="w3-bar-block w3-border" style="display:none">
            <button onclick="document.getElementById('scr_1001').style.display='block'" class="w3-button w3-large">Sinh viên</button>
            <?php include "student.php" ?>
            <button onclick="document.getElementById('scr_1002').style.display='block'" class="w3-button w3-large">Công ty</button>
            <?php include "company.php" ?>
            <button onclick="document.getElementById('scr_1003').style.display='block'" class="w3-button w3-large">Giáo viên</button>
            <?php include "teacher.php" ?>
        </div>
    </div>

</header>

