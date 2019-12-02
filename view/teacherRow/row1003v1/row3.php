<tr>
    <th><?php echo $nameCompanyv1[2]?></th>
    <th><?php echo $short_descriptionv1[2]?></th>
    <th><?php echo $amountv1[2]?></th>
    <th><?php echo $date_submittedv1[2]?></th>
    <th><?php if($statusv1[2]==0){echo "chưa duyệt";} ?></th>
    <th><form action='../view/teacher/xuly.php' method='GET'>
            <input style="display:none " name="idRequests" value="<?php echo $idRequestsv1[2] ?>">
            <input style="display:none " name="teacherCode" value='<?php echo $username?>'>
            <input class="w3-light-grey" type="submit" name="duyet" value="Duyệt">
        </form>
    </th>
</tr>