<tr>
    <th><?php if(empty($namecty2[3])) {echo $name;} else {echo $namecty2[3];} ?></th>
    <th><?php echo $short_description[3]?></th>
    <th><?php echo $amount[3]?></th>
    <th><?php echo $amount[3]?></th>
    <th><?php if($status2[3]==0){echo "chưa duyệt";}else{echo "đã duyệt";}?></th>
    <th><button onclick="f();d()" class="w3-light-grey">Sửa</button></th>
    <th><button onclick="f1();d1()" class="w3-light-grey">Danh sách</button></th>
</tr>