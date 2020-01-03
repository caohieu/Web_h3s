<?php
    $info_request = mysqli_query($conn,"SELECT *,`intern_organization_request_assignments`.id as assign_id,
                                        `intern_organization_request_assignments`.status as assign_status
                                        FROM `intern_organization_request_assignments`,
                                        `intern_organization_requests`,`intern_organizations`
                                        WHERE student_id = $student_id
                                        AND organization_request_id = intern_organization_requests.id
                                        AND organization_id = `intern_organizations`.`id`");
    
    $status_table = array(
        0 => "Chưa thực hiện",
        1 => "Đang thực hiện",
        2 => "Đã hoàn thành"
    );
?>

<br><br>
<div class="w3-container" style="margin:auto;">
    <center><h1 style="color:white">Danh sách được phân công của sinh viên</h1></center>
</div>
<br><br>

<div class="w3-container" style="width: 90%;margin:auto;margin-left:10%;">
    <?php
        while($row_req = mysqli_fetch_assoc($info_request)) {
            ?>
                <div class="w3-card-4 w3-animate-top" style=" background-color: white;float: left;width:30%;
                            margin-right: 20px;margin-bottom: 20px;">
                    <header class="w3-container w3-indigo">
                        <center><h1>Phân công: Công ty <?= $row_req['name'] ?></h1></center>
                    </header>
                    <div class="w3-container">
                        <p>Vị trí được phân công: <?= $row_req['position'] ?> </p>
                        <p>Mô tả: <?= $row_req['short_description'] ?> </p>
                        <form action="./assignment/update.php" method="POST">
                            <p>Ngày bắt đầu: <input type="date" class="w3-input" value="<?= $row_req['start_date'] ?>" name="start_date"></p>
                            <p>Ngày kết thúc: <input type="date" class="w3-input" value="<?= $row_req['end_date'] ?>" name="end_date"></p>
                            <input hidden type="text" value="<?= $row_req['assign_id'] ?>" name="id">
                            <input hidden type="text" value="<?= $code ?>" name="code">
                            <input type="submit" class="w3-button w3-red" value="Cập nhật thời gian">
                        </form>
                    </div>
                    <br>
                    <footer class="w3-container w3-blue w3-dropdown-hover" style="width:100%">
                        <h5><?= $status_table[$row_req['assign_status']] ?></h5>

                        <?php 
                            if($row_req['assign_status'] == 0) {
                                ?>
                                    <div class="w3-dropdown-content w3-bar-block w3-border" style="left:0;width:100%">
                                        <a href="./assignment/change_status.php?code=<?= $code ?>&id=<?= $row_req['assign_id'] ?>&status=1" class="w3-bar-item w3-button">Đang thực hiện</a>
                                    </div>
                                <?php
                            }
                        ?>

                        <?php 
                            if($row_req['assign_status'] == 1) {
                                ?>
                                    <div class="w3-dropdown-content w3-bar-block w3-border" style="left:0;width:100%">
                                        <a href="./assignment/change_status.php?code=<?= $code ?>&id=<?= $row_req['assign_id'] ?>&status=2" class="w3-bar-item w3-button">Đã hoàn thành</a>
                                    </div>
                                <?php
                            }
                        ?>
                    </footer>
                </div>
            <?php
        }
    ?>
</div>