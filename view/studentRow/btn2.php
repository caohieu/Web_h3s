<tr>
    <th><?php if(empty($namecty2[1])) {echo $name;} else {echo $namecty2[1];} ?></th>
    <th><?php echo $short_description[1]?></th>
    <th><?php echo $amount[1]?></th>
    <th><?php echo $amount[1]?></th>
    <th><?php if($status2[1]==0){echo "chưa duyệt";}else{echo "đã duyệt";}?></th>
    <th><button onclick="f();b()" class="w3-light-grey">Chi tiết</button></th>
</tr>