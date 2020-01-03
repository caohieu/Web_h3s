<?php
include('../../../db/connect.php');
$request_id = $_GET['req'];
$code = $_GET['code'];
//Sinh viên không trong danh sách phân công và có nhu cầu
$list_student_req_sql = "SELECT * FROM intern_students 
            WHERE id NOT IN 
                (SELECT student_id from `intern_organization_request_assignments`)
            AND id IN 
                (SELECT student_id from intern_student_registers WHERE request_id = $request_id)";
$list_student_req = mysqli_query($conn,$list_student_req_sql);

//Sinh viên không trong danh sách phân công nhưng có nhu cầu
$list_student_not_req_sql = "SELECT * FROM intern_students 
            WHERE id NOT IN 
                (SELECT student_id from `intern_organization_request_assignments`) 
            AND id NOT IN 
                (SELECT student_id from intern_student_registers WHERE request_id = $request_id)";
$list_student_not_req = mysqli_query($conn,$list_student_not_req_sql);

//Danh sách sinh viên đã phân công
$list_student_assign_sql = "SELECT *,`intern_students`.id as student_id FROM `intern_students`,`intern_organization_request_assignments`
            WHERE intern_students.id = student_id 
            AND intern_organization_request_assignments.organization_request_id = $request_id";
$list_student_assign = mysqli_query($conn,$list_student_assign_sql);

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
        background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9)),url("../../../images/1.jpg") no-repeat center 0px;
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
    <br><br>
    <div class="w3-card-4" style="background-color:white;width:80%;margin:auto">
        
        <header class="w3-container w3-blue">
            <h2>Danh sách sinh viên chưa được phân công</h2>
        </header>
        
        <div class="w3-row">
            <a href="javascript:void(0)" onclick="openCity(event, 'London');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" id="lodon">Có nhu cầu</div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'Paris');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Không có nhu cầu</div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'Tokyo');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Đã phân công</div>
            </a>
        </div>

        <div id="London" class="w3-container city" style="display:none">
            <br>
            <table class="w3-table-all">
                <tr>
                    <th>Tên sinh viên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Năm vào học</th>
                    <th>Lớp học</th>
                    <th>Phân công</th>
                </tr>
                <?php
                    while($row_student = mysqli_fetch_assoc($list_student_req)) {
                        ?>
                            <tr>
                                <td><?= $row_student['last_name'] ?> <?= $row_student['sur_name'] ?> <?= $row_student['first_name'] ?></td>
                                <td><?= $row_student['gender'] ?></td>
                                <td><?= $row_student['date_of_birth'] ?></td>
                                <td><?= $row_student['join_date'] ?></td>
                                <td><?= $row_student['class_name'] ?></td>
                                <td>
                                    <form action="./create.php" method="POST">
                                        <input hidden type="number" value="<?= $code ?>" name="code"/>
                                        <input hidden type="number" value="<?= $request_id ?>" name="request_id"/>
                                        <input hidden type="number" value="<?= $row_student['id'] ?>" name="student_id"/>
                                        <button class="w3-button w3-teal">Phân công sinh viên</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
            <br>
            <a class = "w3-button w3-red" href="../../index.php?code=<?= $code ?>">Trở về</a>
            <br><br>
        </div>

        <div id="Paris" class="w3-container city" style="display:none">
            <br>
            <table class="w3-table-all">
                <tr>
                    <th>Tên sinh viên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Năm vào học</th>
                    <th>Lớp học</th>
                    <th>Phân công</th>
                </tr>
                <?php
                    while($row_student = mysqli_fetch_assoc($list_student_not_req)) {
                        ?>
                            <tr>
                                <td><?= $row_student['last_name'] ?> <?= $row_student['sur_name'] ?> <?= $row_student['first_name'] ?></td>
                                <td><?= $row_student['gender'] ?></td>
                                <td><?= $row_student['date_of_birth'] ?></td>
                                <td><?= $row_student['join_date'] ?></td>
                                <td><?= $row_student['class_name'] ?></td>
                                <td>
                                    <form action="./create.php" method="POST">
                                        <input hidden type="number" value="<?= $code ?>" name="code"/>
                                        <input hidden type="number" value="<?= $request_id ?>" name="request_id"/>
                                        <input hidden type="number" value="<?= $row_student['id'] ?>" name="student_id"/>
                                        <button class="w3-button w3-teal">Phân công sinh viên</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
            <br>
            <a class = "w3-button w3-red" href="../../index.php?code=<?= $code ?>">Trở về</a>
            <br><br>
        </div>

        <div id="Tokyo" class="w3-container city" style="display:none">
            <br>
            <table class="w3-table-all">
                    <tr>
                        <th>Tên sinh viên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Năm vào học</th>
                        <th>Lớp học</th>
                        <th>Bỏ phân công</th>
                    </tr>
                    <?php
                        while($row_student = mysqli_fetch_assoc($list_student_assign)) {
                            ?>
                                <tr>
                                    <td><?= $row_student['last_name'] ?> <?= $row_student['sur_name'] ?> <?= $row_student['first_name'] ?></td>
                                    <td><?= $row_student['gender'] ?></td>
                                    <td><?= $row_student['date_of_birth'] ?></td>
                                    <td><?= $row_student['join_date'] ?></td>
                                    <td><?= $row_student['class_name'] ?></td>
                                    <td>
                                        <form action="./delete.php" method="POST">
                                            <input hidden type="number" value="<?= $code ?>" name="code"/>
                                            <input hidden type="number" value="<?= $request_id ?>" name="request_id"/>
                                            <input hidden type="number" value="<?= $row_student['student_id'] ?>" name="student_id"/>
                                            <button class="w3-button w3-red">Bỏ phân công sinh viên</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
            </table>
            <br>
            <a class = "w3-button w3-red" href="../../index.php?code=<?= $code ?>">Trở về</a>
            <br><br>
        </div>
    </div>
    

    <script>
        document.getElementById("lodon").click();
        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.firstElementChild.className += " w3-border-red";
        }
    </script>

</body>
</html>
