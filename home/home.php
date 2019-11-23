<!DOCTYPE html>
<html lang="en">
<title>Sàn giao dịch thực tập sinh</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
	.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
	.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

	<!-- Navbar -->
	<div class="w3-top">
		<div class="w3-bar w3-red w3-card w3-left-align w3-large">
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			<a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
			<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Mẫu CV</a>
			<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Việc làm</a>
			<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Công ty</a>
            <?php
            if(!isset($name)){
                include "form_sign_up.php";
            }else{
                if($dangnhap=='tea'){
                    include "acc_teache.php";
                }
                if($dangnhap=='stu'){
                    include "acc_student.php";
                }
                if($dangnhap=='com'){
                    include "acc_company.php";
                }
            } ?>
		</div>

		<!-- Navbar on small screens -->
		<div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
			<a href="#" class="w3-bar-item w3-button w3-padding-large">Mẫu CV</a>
			<a href="#" class="w3-bar-item w3-button w3-padding-large">Việc Làm</a>
			<a href="#" class="w3-bar-item w3-button w3-padding-large">Công ty</a>
            <?php
            if(!isset($name)){
                include "form_sign_up.php";
            }else{
                if($dangnhap=='tea'){
                    include "acc_teache.php";
                }
                if($dangnhap=='stu'){
                    include "acc_student.php";
                }
                if($dangnhap=='com'){
                    include "acc_company.php";
                }

            } ?>
		</div>
	</div>
    <div>
        <?php
        if(!isset($name)){
            include "../login/form_login.php";
        }
        else{
            if($dangnhap=='stu'){
                include "../view/student_view.php";
                include "../view/student_view2.php";
            }
            if($dangnhap=='tea'){
                include "../view/teacher_view.php";
                include "../view/teacher_view2.php";
            }
            if($dangnhap=='com'){
                include "../view/company_view.php";
                include "../view/company_view2.php";
            }

        }
        ?>
    </div>
	<div class="w3-row-padding w3-padding-64 w3-container">
		<div class="w3-content">
			<div class="w3-twothird">
				<h1>Việc làm Chất lượng</h1>
				<h5 class="w3-padding-32">Hàng ngàn tin tuyển dụng chất lượng cao được cập nhật thường xuyên để đáp ứng nhu cầu tìm việc của ứng viên.
				Hệ thống thông minh tự động gợi ý các công việc phù hợp theo CV của bạn.</h5>

				<p class="w3-text-grey">Nhà tuyển dụng chủ động tìm kiếm và liên hệ với bạn qua hệ thống kết nối ứng viên thông minh.
					Báo cáo chi tiết Nhà tuyển dụng đã xem CV và gửi offer tới bạn.
				</p>
			</div>

			<div class="w3-third w3-center">
				<i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
		<div class="w3-content">
			<div class="w3-third w3-center">
				<i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right"></i>
			</div>

			<div class="w3-twothird">
				<h1>Hỗ trợ Người tìm việc</h1>
				<h5 class="w3-padding-32">Bạn có thể chủ động bật / tắt trạng thái tìm việc, trạng thái cho phép Nhà tuyển dụng xem hồ sơ. Nếu các trạng thái tắt, không ai có thể xem được CV của bạn.</h5>

				<p class="w3-text-grey">Các Nhà tuyển dụng đều được TopCV xác thực rõ ràng danh tính, đảm bảo đến từ các công ty uy tín, giúp bạn yên tâm hơn khi ứng tuyển và sớm chủ động nhận được phản hổi.</p>
			</div>
		</div>
	</div>
	<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
		<h1 class="w3-margin w3-xlarge">Sàn buôn bán thực tập sinh số 1 Việt Nam</h1>
	</div>
	<footer class="w3-container w3-padding-64 w3-center w3-opacity">
		<div class="w3-xlarge w3-padding-32">
			<i class="fa fa-facebook-official w3-hover-opacity"></i>
			<i class="fa fa-instagram w3-hover-opacity"></i>
			<i class="fa fa-snapchat w3-hover-opacity"></i>
			<i class="fa fa-pinterest-p w3-hover-opacity"></i>
			<i class="fa fa-twitter w3-hover-opacity"></i>
			<i class="fa fa-linkedin w3-hover-opacity"></i>
		</div>
	</footer>
	<script>
    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
	var x = document.getElementById("navDemo");
	    if (x.className.indexOf("w3-show") == -1) {
		    x.className += " w3-show";
	    } else {
		    x.className = x.className.replace(" w3-show", "");
	    }
    }
    </script>

</body>
</html>
