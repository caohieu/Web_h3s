<!DOCTYPE html>
<div class="w3-dropdown-hover">
    <button  class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><?php echo $name ?></button>
    <div class="w3-dropdown-content w3-bar-block w3-border" style="top: 50px">
        <a onclick= "
        if (document.getElementById('scr_1002').style.display=='none'){
            document.getElementById('scr_1002').style.display='block'
        }else {
            document.getElementById('scr_1002').style.display='none'
        }
        document.getElementById('scr_1002c').style.display='none'" class="w3-bar-item w3-button">Danh sách phiếu</a>
        <a onclick="
        if (document.getElementById('scr_1002c').style.display=='none'){
            document.getElementById('scr_1002c').style.display='block'
        }else {
            document.getElementById('scr_1002c').style.display='none'
        }
            document.getElementById('scr_1002').style.display='none'" class="w3-bar-item w3-button">Tạo mới yêu cầu</a>
    </div>
</div>