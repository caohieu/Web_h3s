<tr>
    <th><?php echo $nameCompanyv1[8]?></th>
    <th><?php echo $short_descriptionv1[8]?></th>
    <th><?php echo $amountv1[8]?></th>
    <th><?php echo $date_submittedv1[8]?></th>
    <th><?php if($statusv1[8]==0){echo "chưa duyệt";} ?></th>
    <th><form action='../view/teacher/xuly.php' method='GET'>
            <input style="display:none " name="idRequests" value="<?php echo $idRequestsv1[8] ?>">
            <input style="display:none " name="teacherCode" value='<?php echo $username?>'>
            <input class="w3-light-grey" type="submit" name="duyet" value="Duyệt">
        </form>
    </th>
</tr>