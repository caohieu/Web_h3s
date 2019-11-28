<div id="scr_1002c" class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="height: 600px;display: none">
    <h1 class="w3-padding-32 w3-center">TẠO PHIẾU ĐĂNG KÝ</h1>
    <div class="w3-center">
        <div class="w3-content"style="width: 500px">
            <div class="w3-half">
                <h5> Tên công ty : </h5>
                <h5> Mô tả(vị trí) : </h5>
                <h5> Số người cần tuyển : </h5>
                <h5> Ngày đăng : </h5>
            </div>
            <div class="w3-half">
                <h5><?php echo $name; ?></h5>
                <input style="height: 35px" id="b">
                <input style="height: 35px" id="c">
                <input style="height: 35px" id="d">
            </div>
            <div>
                <input onclick="document.getElementById('scr_1002c').style.display='none'" class="w3-button w3-green w3-section w3-center" type="submit" name="dangky" style="width: 300px" value="Xac Nhan">
                <input onclick="document.getElementById('scr_1002c').style.display='none'" class="w3-button w3-green w3-section w3-center" type="submit" name="trove" style="width: 300px" value="Trở Về">
            </div>
        </div>
    </div>
</div>