<tr>
    <th><?php if(empty($namecty2[4])) {echo $name;} else {echo $namecty2[4];} ?></th>
    <th><?php echo $short_description[4]?></th>
    <th><?php echo $amount[4]?></th>
    <th><?php echo $amount[4]?></th>
    <th><?php if($status2[4]==0){echo "chưa duyệt";}else{echo "đã duyệt";}?></th>
    <th><button onclick="f();e()" class="w3-light-grey">Sửa</button></th>
    <th><button onclick="f1();e1()" class="w3-light-grey">Danh sách</button></th>
</tr>