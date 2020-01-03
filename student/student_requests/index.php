<?php
    $info_request = mysqli_query($conn,"SELECT *,intern_student_registers.status,intern_organizations.name as req_status 
                                FROM `intern_student_registers`,`intern_organization_requests`,`intern_organizations`
                                WHERE student_id = $student_id
                                -- AND intern_student_registers.status = 1 
                                AND request_id = intern_organization_requests.id
                                AND intern_organization_requests.organization_id = intern_organizations.id");
    
?>

<br><br>
<div class="w3-container" style="margin:auto;">
    <center><h1 style="color:white">Danh sách phiếu đăng ký của sinh viên</h1></center>
</div>
<br><br>

<div class="w3-container" style="width: 90%;margin:auto;margin-left:10%;">
    <?php
        while($row_req = mysqli_fetch_assoc($info_request)) {
            $id = $row_req['id'];

            switch ($row_req['req_status']) {
                case 1:
                    $status = "Đã chấp nhận";
                    break;
                case 0:
                    $status = "Chờ duyệt";
                    break;
            }
            ?>
                <div class="w3-card-4 w3-animate-top" style=" background-color: white;float: left;width:30%;
                            margin-right: 20px;margin-bottom: 20px;">
                    <header class="w3-container w3-deep-purple">
                        <center><h1>Công ty <?= $row_req['name'] ?></h1></center>
                    </header>
                    <div class="w3-container">
                        <p>Vị trí đăng ký: <?= $row_req['position'] ?> </p>
                        <p>Mô tả: <?= $row_req['short_description'] ?> </p>
                        <p>Số lượng tuyển của doanh nghiệp: <?= $row_req['amount'] ?> </p>
                        <p>Ngày sinh viên đăng ký: <?= $row_req['created_at'] ?> </p>
                        <p>Trạng thái: <?= $status ?> </p>
                    </div>
                </div>
            <?php
        }
    ?>
</div>