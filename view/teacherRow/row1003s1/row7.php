<tr>
    <th><?php echo $nameCompanys1[6]?></th>
    <th><?php echo $firstNames1[6];echo $lastNames1[6]?></th>
    <th><?php echo $create_dates1[6]?></th>
    <th><?php if($statuss1[6]==1){echo "Đang xử lý";} ?></th>
    <th><form action='../view/teacher/xuly1.php' method='GET'>
            <input style="display:none " name="idRequests" value="<?php echo $idRequestsAssignment[6] ?>">
            <input style="display:none " name="teacherCode" value='<?php echo $username?>'>
            <input class="w3-light-grey" type="submit" name="duyetphieu" value="Duyệt">
        </form>
    </th>
</tr>