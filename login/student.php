<?php
if (isset($_GET['dangnhap']))
{
    include('../db/ketnoi.php');
    $username = $_GET['usrname'];
    $password = $_GET['psw'];
    $password = md5($password);
    $query = mysqli_query($conn,"SELECT id,student_code,first_name  FROM intern_students WHERE student_code='$username'");
    if (mysqli_num_rows($query) != 0) {
        $row = mysqli_fetch_array($query);
        $name=$row['first_name'];
        $studentId=$row['id'];
        $dangnhap='stu';
        echo $dangnhap;
        //header("Location: home.php");
        include "../home/home.php";
        exit;
    }
}
?>
<!DOCTYPE html>
<div id="scr_1001" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center"><br>
            <span onclick="document.getElementById('scr_1001').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
            <img src="upload/image/img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
        </div>
        <form method="get" class="w3-container" action="../login/student.php" >
            <div class="w3-section">
                <label><b>Username</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="usrname" required>
                <label><b>Password</b></label>
                <input class="w3-input w3-border" type="text" placeholder="Enter Password" name="psw" required>
                <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="dangnhap" value="Đăng nhập">
                <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
            </div>
        </form>

        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('scr_1001').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            <span class="w3-right w3-padding w3-hide-small">Quên <a href="#">password?</a></span>
        </div>

    </div>
</div>
</html>