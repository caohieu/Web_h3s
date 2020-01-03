<?php 
    $info_ability_dict = mysqli_query($conn,"SELECT * FROM `intern_abilities_dictionary`");
?>


<br><br>
<form action="./request/create.php" method="POST">
<div class="w3-card-4 w3-animate-bottom" style="border-radius: 20px;width: 80%;margin: auto;background-color:white;">

    <header class="w3-container w3-blue" style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
    <h1>Thêm mới phiếu yêu cầu</h1>
    </header>

    <div class="w3-container">
        <input hidden name="company_id" type="text" value="<?= $company_id ?>">
        <input hidden name="code" type="text" value="<?= $code ?>">

        <p>
            <label>Vị trí tuyển dụng</label>
            <input class="w3-input w3-border w3-round-large" name="positon" type="text">
            
        </p>
        <p>            
            <label>Mô tả công việc</label>
            <textarea class="w3-input w3-border w3-round-large" name="short_description"></textarea>
        </p>
        <p>            
            <label>Số lượng người cần tuyển</label>
            <input class="w3-input w3-border w3-round-large" name="amount" type="number">
        </p>

        <div style="height:350px;overflow: auto">
            <table class="w3-table-all" >
                <tr>   
                    <th>Lựa chọn năng lực</th>
                    <th>Tên năng lực</th>
                    <th>Loại năng lực</th>
                    <th>Mức đánh giá</th>
                    <th>Mức yêu cầu</th>
                    <th>Ghi chú</th>
                </tr>
                <tr>
                <?php
                    while($value = mysqli_fetch_assoc($info_ability_dict)) {
                        ?>
                            <tr>
                                <td><input class="w3-check check_<?= $value['id'] ?>" type="checkbox"></td>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['type'] ?></td>
                                <td><?= $value['note'] ?></td>
                                <td>
                                    <input class="w3-input w3-border w3-round-large require_input_<?= $value['id'] ?>"
                                        type="number" disabled name="ability[<?= $value['id'] ?>][require]">
                                </td>
                                <td>
                                    <textarea name="ability[<?= $value['id'] ?>][note]" class="require_textarea_<?= $value['id'] ?> 
                                    w3-input w3-border w3-round-large" disabled></textarea>
                                </td>
                            </tr>
                        <?php
                    }
                    ?>
                        
                    <?php
                ?>
            </table>
    </div>
        <br></br>
    </div>

    <footer class="w3-container" style="border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;">
        <button class="w3-button w3-teal w3-right" type="submit">Tạo mới</button>
        <br><br><br>
    </footer>
</div>
</form>

<script>
    $(function(){
        <?php
            $info_ability_dict = mysqli_query($conn,"SELECT * FROM `intern_abilities_dictionary`");
            while($value = mysqli_fetch_assoc($info_ability_dict)) {
                ?>
                    $('.check_<?= $value['id'] ?>').change(function() {
                        if($(this).is(":checked")) {
                            $(".require_textarea_<?= $value['id'] ?>").prop( "disabled", false );
                            $(".require_input_<?= $value['id'] ?>").prop( "disabled", false );
                        } else {
                            $(".require_textarea_<?= $value['id'] ?>").prop( "disabled", true );
                            $(".require_input_<?= $value['id'] ?>").prop( "disabled", true );
                        }                  
                    });
                <?php
            }
        ?>
    });
</script>