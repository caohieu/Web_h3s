<?php
    include('../db/connect.php');
    $code = $_GET['code'];

    if( !isset($_GET['option']) ){
        $option = 1;
    } else {
        $option = $_GET['option'];
    }

    $info_teacher = mysqli_query($conn,"SELECT * FROM intern_teachers WHERE code='$code' ");
    $row = mysqli_fetch_assoc($info_teacher);

    $teacher_id = $row['id'];
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!-- Custom Theme files -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"/> -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
    body {
        font-family: 'Muli', sans-serif;
        background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9)),url("../images/1.jpg") no-repeat center 0px;
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
        <div class="w3-dropdown-hover w3-right">
            <button class="w3-button w3-dark-gray">Xin chào giảng viên <b><?= $row['full_name'] ?></button>
            <div class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
                <a href="../login/index.php" class="w3-bar-item w3-button">Đăng xuất</a>
            </div>
        </div>
    </div>

    <?php 
        // switch ($option) {
        //     case 1:
            include("company_request/index.php");
        //         break;
        //     case 2:
        //         include("request/create_view.php");
        //         break;
        // }
    ?>

</body>
</html>