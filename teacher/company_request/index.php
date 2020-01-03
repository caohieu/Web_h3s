<?php
    $info_company = mysqli_query($conn,"SELECT intern_organization_requests.*,intern_organizations.name
            FROM intern_organization_requests,intern_organizations
            WHERE intern_organization_requests.organization_id = intern_organizations.id ORDER BY intern_organization_requests.status");

    $info_ability_dict = mysqli_query($conn,"SELECT * FROM `intern_abilities_dictionary`"); 
?>

<br><br>
<div class="w3-container" style="margin:auto;">
    <center><h1 style="color:white">Danh sách phiếu yêu cầu tuyển dụng của doanh nghiêp</h1></center>
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
                    $color = "w3-red";
                    break;
                case 3000:
                    $status =  "Chờ sinh viên đăng ký";
                    $color = "w3-yellow";
                    break;
                case 4000:
                    $status =  "Ngừng nhận đăng ký";
                    $color = "w3-teal";
                    break;
                case 5000:
                    $status =  "Không được nhà trường phê duyệt";
                    $color = "w3-black";
                    break;
            }
            
            $info_student_assign_list = mysqli_query($conn,"SELECT intern_students.* FROM intern_organization_request_assignments,intern_students 
                                                            WHERE organization_request_id = $id 
                                                            AND intern_organization_request_assignments.student_id = intern_students.id");

            $total_assignment = mysqli_num_rows($info_student_assign_list);

            $info_student_req = mysqli_query($conn,"SELECT COUNT(student_id) as total
                                                    FROM intern_student_registers
                                                    WHERE request_id = $id");
            
            $total_req = mysqli_fetch_assoc($info_student_req)['total'];

            $info_require_ability = mysqli_query($conn,"SELECT *,intern_organization_request_abilities.note as req_note FROM `intern_organization_request_abilities`,`intern_abilities_dictionary` 
                                                    WHERE organization_request_id = $id
                                                    AND intern_organization_request_abilities.ability_id = intern_abilities_dictionary.id");

            $ability_haved = [];
            while($row_require_ability = mysqli_fetch_assoc($info_require_ability)) {
                $ability_haved[$row_require_ability['id']] = [$row_require_ability['ability_rate_required'],$row_require_ability['req_note']];
            }

            $info_ability_list = mysqli_query($conn,"SELECT * FROM `intern_abilities_dictionary`");

            $ability_list = [];
            while($row_ability = mysqli_fetch_assoc($info_ability_list)) {
                if( array_key_exists($row_ability['id'],$ability_haved) ){
                    $row_ability['have'] = 1;
                    $row_ability['rate'] = $ability_haved[$row_ability['id']][0];
                    $row_ability['req_note'] = $ability_haved[$row_ability['id']][1];
                } else {
                    $row_ability['have'] = 0;
                }
                array_push($ability_list,$row_ability);
            }
            // var_dump($ability_list);die;
            ?>
                <div class="w3-card-4 w3-animate-top" style=" background-color: white;float: left;width:30%;
                            margin-right: 20px;margin-bottom: 20px;">
                    <header class="w3-container <?= $color ?>">
                    <center><h1>Công ty <?= $row_company['name'] ?></h1></center>
                    </header>
                    <div class="w3-container">
                        <p>Vị trí tuyển: <?= $row_company['position'] ?></p>
                        <p>Mô tả: <?= $row_company['short_description'] ?> </p>
                        <p>Số lượng tuyển: <?= $row_company['amount'] ?> </p>
                        <p>Trạng thái: <?= $status ?> </p>
                    </div>

                    <footer class="w3-container w3-blue" onclick="document.getElementById('modal_<?= $id ?>').style.display='block'">
                        <center><h5>Chi tiết</h5></center>
                    </footer>
                    <footer class="w3-container w3-blue-grey" onclick="document.getElementById('modal_assign_<?= $id ?>').style.display='block'">
                        <center><h5>Xem bảng phân công</h5></center>
                    </footer>
                </div>

                <div id="modal_assign_<?= $id ?>" class="w3-modal">
                    <div class="w3-modal-content w3-animate-top w3-card-4">
                        <header class="w3-container w3-blue"> 
                            <span onclick="document.getElementById('modal_assign_<?= $id ?>').style.display='none'" 
                            class="w3-button w3-display-topright w3-red">&times;</span>
                            <h2>Danh sách sinh viên được phân công</h2>
                        </header>
                        <br>
                        <div class="w3-container">
                            <a class="w3-button w3-green" href="./company_request/assign_student/index.php?code=<?= $code ?>&req=<?= $id ?>">Sửa đổi danh sách phân công</a>
                            <br><br>
                            <table class="w3-table-all">
                                <tr>
                                    <th>Tên sinh viên</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Năm vào học</th>
                                    <th>Lớp học</th>
                                </tr>
                                <?php
                                    while($row_student = mysqli_fetch_assoc($info_student_assign_list)) {
                                        ?>
                                            <tr>
                                                <td><?= $row_student['last_name'] ?> <?= $row_student['sur_name'] ?> <?= $row_student['first_name'] ?></td>
                                                <td><?= $row_student['gender'] ?></td>
                                                <td><?= $row_student['date_of_birth'] ?></td>
                                                <td><?= $row_student['join_date'] ?></td>
                                                <td><?= $row_student['class_name'] ?></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </table>
                        </div>
                        <br>
                        <footer class="w3-container">
                            <a class="w3-button w3-red w3-left" onclick="document.getElementById('modal_assign_<?= $id ?>').style.display='none'" >Đóng</a>
                            <br><br><br>
                        </footer>
                    </div>
                </div>

                <div id="modal_<?= $id ?>" class="w3-modal">
                    <div class="w3-modal-content w3-animate-top w3-card-4">
                        <header class="w3-container w3-blue"> 
                            <span onclick="document.getElementById('modal_<?= $id ?>').style.display='none'" 
                            class="w3-button w3-display-topright w3-red">&times;</span>
                            <h2>Công ty <?= $row_company['name'] ?></h2>
                        </header>
                        <div class="w3-container">
                            <p>
                                <label>Vị trí tuyển dụng</label>
                                <input disabled class="w3-input w3-border w3-round-large" name="positon" type="text" value="<?= $row_company['position'] ?>">
                                
                            </p>
                            <p>            
                                <label>Mô tả công việc</label>
                                <textarea disabled class="w3-input w3-border w3-round-large" name="short_description"><?= $row_company['short_description'] ?></textarea>
                            </p>
                            <p>            
                                <label>Số lượng người cần tuyển</label>
                                <input disabled class="w3-input w3-border w3-round-large" name="amount" type="number" value="<?= $row_company['amount'] ?>">
                            </p>
                            Danh sách năng lực:
                            <br>
                            <div style="height:100px;overflow: auto">
                                <table class="w3-table-all" >
                                    <tr>   
                                        <th>Tên năng lực</th>
                                        <th>Loại năng lực</th>
                                        <th>Mức đánh giá</th>
                                        <th>Mức yêu cầu</th>
                                        <th>Ghi chú</th>
                                    </tr>
                                    <tr>
                                    <?php 
                                        foreach($ability_list as $key => $value) {
                                            if($value['have'] == 1) {
                                                ?>
                                                    <tr>
                                                        <td><?= $value['name'] ?></td>
                                                        <td><?= $value['type'] ?></td>
                                                        <td><?= $value['note'] ?></td>
                                                        <td><?= $value['rate'] ?></td>
                                                        <td><?= $value['req_note'] ?></td>
                                                    </tr>
                                                <?php              
                                            }
                                        }
                                        ?>
                                            
                                        <?php
                                    ?>
                                </table>
                            </div>
                        </div>
                        <footer class="w3-container">
                            <a class="w3-button w3-red w3-left" onclick="document.getElementById('modal_<?= $id ?>').style.display='none'" >Đóng</a>
                            <br><br><br>
                        </footer>
                    </div>
                </div>
            <?php
        }
    ?>
</div>

<script>
    $(function(){
        <?php
            while($row_dict = mysqli_fetch_assoc($info_ability_dict)) {
                ?>
                    $('.check_<?= $row_dict['id'] ?>').change(function() {
                        if($(this).is(":checked")) {
                            $(".require_textarea_<?= $row_dict['id'] ?>").prop( "disabled", false );
                            $(".require_input_<?= $row_dict['id'] ?>").prop( "disabled", false );
                        } else {
                            $(".require_textarea_<?= $row_dict['id'] ?>").prop( "disabled", true );
                            $(".require_input_<?= $row_dict['id'] ?>").prop( "disabled", true );
                        }                  
                    });
                <?php
            }
        ?>
    });
</script>