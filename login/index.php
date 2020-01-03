<?php
    if($_POST && !empty($_POST)){
        include('../db/connect.php');

        $option = $_POST['log_in_option'];
        $username = $_POST['log_in_username'];
        $password = md5($_POST['log_in_password']);

        switch ($option) {
            case 1:
                $query = mysqli_query($conn,"SELECT * FROM intern_students WHERE code='$username' AND password='$password' ");
                break;
            case 2:
                $query = mysqli_query($conn,"SELECT * FROM intern_organizations WHERE code='$username' AND password='$password'");
                break;
            case 3:
                $query = mysqli_query($conn,"SELECT * FROM intern_teachers WHERE code='$username' AND password='$password'");
                break;
        }

        if (mysqli_num_rows($query) == 0) {
            $error_msg = "Sai thông tin định danh";
        } else {
            switch ($option) {
                case 1:
                    echo "<script>location.href='../student/index.php?code=$username';</script>";
                    break;
                case 2:
                    echo "<script>location.href='../company/index.php?code=$username';</script>";
                    break;
                case 3:
                    echo "<script>location.href='../teacher/index.php?code=$username';</script>";
                    break;
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Custom Theme files -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"/> -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
    body {
        font-family: 'Muli', sans-serif;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),url(../images/1.jpg) no-repeat center 0px;
        -webkit-background-size:cover;
        -moz-background-size:cover; 
        background-size:cover;
        background-attachment: fixed;
        /* text-align:center; */
    } 
</style>
</head>
<body>
	<div class="w3-bar w3-black w3-xlarge">
        <a href="#" class="w3-bar-item w3-button">Sàn giao dịch thực tập sinh</a>
        <a href="#" style="float: right;" class="w3-bar-item w3-button">Đăng ký</a>
    </div>

    <div style="width:50%;margin: auto;margin-top: 5%;">
        <div class="w3-card-4" style="background-color: aliceblue;">
            <div class="w3-container w3-black">
              <h2>Thông tin đăng nhập</h2>
            </div>
            <form method="post" class="w3-container" action="#" id="form">
                <p>
                    <label class="w3-text-black"><b>Định danh</b></label>
                    <select class="w3-select w3-border" name="log_in_option">
                        <option value="1" selected>Học viên</option>
                        <option value="2">Công ty</option>
                        <option value="3">Giáo viên</option>
                      </select>
                </p>
                <p>      
                    <label class="w3-text-black"><b>Tên đăng nhập</b></label>
                    <input class="w3-input w3-border" name="log_in_username" type="text" id="username" required
                        value="<?php if($_POST && !empty($_POST)){
                            echo($_POST['log_in_username']);
                        } ?>">
                </p>
                <p>      
                    <label class="w3-text-black"><b>Mật khẩu</b></label>
                    <input class="w3-input w3-border" name="log_in_password" type="password" required></p>
                <p> 
                <?php if (isset($error_msg)){
                    ?>
                        <p style="color:red"><?php echo($error_msg) ?></p>
                    <?php
                }
                ?>
                </p>
                <input type="submit" hidden id="submit_real">
                <a class="w3-btn w3-blue" id="submit">Đăng nhập</a><p></p>
            </form>
          </div>
    </div>
    <script>
        $(function(){
            $('#submit').click(function(){
                localStorage.setItem("username", $('#username').val());
                $('#submit_real').click();
            });
        });
        
    </script>
</body>
</html>