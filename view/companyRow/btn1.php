<tr>
    <th><?php if(empty($namecty2[0])) {echo $name;} else {echo $namecty2[0];} ?></th>
    <th><?php echo $short_description[0]?></th>
    <th><?php echo $amount[0]?></th>
    <th><?php echo $amount[0]?></th>
    <th><?php if($status2[0]==0){echo "chưa duyệt";}else{echo "đã duyệt";}?></th>
    <th><button onclick="f();a()" class="w3-light-grey">Sửa</button></th>
    <th><button onclick="f1();a1()" class="w3-light-grey">Danh sách</button></th>
</tr>
