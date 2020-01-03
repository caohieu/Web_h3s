<?php
    $info_company = mysqli_query($conn,"SELECT intern_organization_requests.*,intern_organizations.name,intern_organization_requests.id as req_id
            FROM intern_organization_requests,intern_organizations
            WHERE intern_organization_requests.organization_id = intern_organizations.id");
    
    if(isset($_GET['msg'])){
        if($_GET['msg'] == "success"){
            ?>
                <script>alert("Đăng ký thành công")</script>
                <script language="javascript">window.location.href ="./index.php?code=<?= $code ?>&option=1"</script>
            <?php
        } else {
            ?>
                <script>alert("Thay đổi thất bại")</script>
            <?php
        }
    } 

    if(isset($_GET['already'])){
        ?>
            <script>alert("Bạn đã đăng ký phiếu này rồi")</script>
            <script language="javascript">window.location.href ="./index.php?code=<?= $code ?>&option=1"</script>
        <?php
    }
?>

<br><br>
<div class="w3-container" style="margin:auto;">
    <center><h1 style="color:white">Danh sách phiếu yêu cầu tuyển dụng của doanh nghiệp</h1></center>
</div>
<br><br>
<div class="w3-container" style="width: 90%;margin:auto;margin-left:10%;">
    <?php
        while($row_company = mysqli_fetch_assoc($info_company)) {
            $id = $row_company['id'];
            switch ($row_company['status']) {
                case 1000:
                    $status =  "Đang soạn";
                    $color = "w3-blue";
                    break;
                case 2000:
                    $status =  "Chờ nhà trường duyệt";
                    $color = "w3-teal";
                    break;
                case 3000:
                    $status =  "Chờ sinh viên đăng ký";
                    $color = "w3-yellow";
                    break;
                case 4000:
                    $status =  "Ngừng nhận đăng ký";
                    $color = "w3-red";
                    break;
                case 5000:
                    $status =  "Không được nhà trường phê duyệt";
                    $color = "w3-black";
                    break;
            }

            $info_student_assign = mysqli_query($conn,"SELECT count(student_id) as total
                                                    FROM intern_organization_request_assignments 
                                                    WHERE organization_request_id = $id");
            
            $total_assignment = mysqli_fetch_assoc($info_student_assign)['total'];

            $info_student_req = mysqli_query($conn,"SELECT COUNT(student_id) as total
                                                    FROM intern_student_registers
                                                    WHERE request_id = $id");
            
            $total_req = mysqli_fetch_assoc($info_student_assign)['total'];

            $info_require_ability = mysqli_query($conn,"SELECT * FROM `intern_organization_request_abilities`,`intern_abilities_dictionary` 
                                                    WHERE organization_request_id = $id
                                                    AND intern_organization_request_abilities.ability_id = intern_abilities_dictionary.id");
            ?>
                <div class="w3-card-4 w3-animate-top" style=" background-color: white;float: left;width:30%;
                            margin-right: 20px;margin-bottom: 20px;">
                    <header class="w3-container w3-light-blue">
                    <center><h1>Công ty <?= $row_company['name'] ?></h1></center>
                    </header>
                    <div class="w3-container">
                        <p>Vị trí cần tuyển: <?= $row_company['position'] ?> </p>
                        <p>Mô tả: <?= $row_company['short_description'] ?> </p>
                        <p>Số lượng tuyển: <?= $row_company['amount'] ?> </p>
                        <p>Trạng thái: <?= $status ?> </p>
                    </div>

                    <footer class="w3-container w3-blue" onclick="document.getElementById('modal_<?= $id ?>').style.display='block'">
                    <center><h5>Chi tiết</h5></center>
                    </footer>
                </div>


                <div id="modal_<?= $id ?>" class="w3-modal">
                    <div class="w3-modal-content w3-animate-top w3-card-4">
                    <header class="w3-container w3-blue"> 
                        <span onclick="document.getElementById('modal_<?= $id ?>').style.display='none'" 
                        class="w3-button w3-display-topright w3-red">&times;</span>
                        <h2>Công ty <?= $row_company['name'] ?></h2>
                    </header>
                    <div class="w3-container">
                        <p>Vị trí cần tuyển: <?= $row_company['position'] ?> </p>
                        <p>Mô tả: <?= $row_company['short_description'] ?> </p>
                        <p>Số lượng tuyển: <?= $row_company['amount'] ?> </p>
                        <p>Số sinh viên đã đăng ký: <?= $total_req ?> </p>
                        <p>Số sinh viên đã được phân công: <?= $total_assignment ?> </p>
                        <p>Ngày lập: <?= $row_company['created_at'] ?> </p>
                        <p>Trạng thái: <?= $status ?> </p>
                        <h3>Năng lực yêu cầu: </h3>
                        <table class="w3-table-all">
                            <tr>
                                <th>Tên năng lực</th>
                                <th>Loại năng lực</th>
                                <th>Mức độ</th>
                            </tr>
                            <?php
                                while($row_ability = mysqli_fetch_assoc($info_require_ability)) {
                                    // var_dump($row_ability);die;
                                    ?>
                                        <tr>
                                            <td><?= $row_ability['name'] ?></td>
                                            <td>Ngôn ngữ lập trình</td>
                                            <td><?= $row_ability['note'] ?>/10</td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </table>
                        <br>
                    </div>
                    <footer class="w3-container">
                        <a class="w3-button w3-red w3-left" onclick="document.getElementById('modal_<?= $id ?>').style.display='none'" >Đóng</a>
                        
                        <form action="./company_requests/create.php" method="POST">
                            <input hidden type="text" name="code" value="<?= $code ?>">
                            <input hidden type="text" name="student_id" value="<?= $student_id ?>">
                            <input hidden type="text" name="req_id" value="<?= $row_company['req_id'] ?>">
                            <button class="w3-button w3-teal w3-right" >Đăng ký</button>
                        </form>

                        <br><br><br>
                    </footer>
                    </div>
                </div>
            <?php
        }
    ?>
</div>