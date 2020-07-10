
<?php
	echo "<script>";
	echo "function showForm(){";
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
		
		$insertCustomer = $cs -> insert_customer($_POST); // hàm check catName khi submit lên
		
		echo "document.getElementById('btn-account').click();";
		echo "document.getElementById('regisOpen').click();";
		
	}

 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
		$login_Customer = $cs -> login_customer($_POST); // hàm check catName khi submit lên
		if($login_Customer != '')
		{
			echo "document.getElementById('btn-account').click();";
		}
	}

	echo "}";
    echo "</script>";
	
 ?>

 <div id="id01" class="modal">
    <div class="modal-content">
		<span onclick="document.getElementById('id01').style.display='none'" class="closeX" title="Close Modal">&times;</span>
		<div class="tab">
			<button class="tablinks" onclick="openTab(event, 'Login','L1')" id="defaultOpen">Đăng nhập</button>
			<button class="tablinks" onclick="openTab(event, 'Register', 'L2')" id="regisOpen">Tạo tài khoản</button>
	  	</div>

    	<div id="Login" class="tabcontent">
        	<form id="form-login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<div class="row">
					<div class="col-25">
						<label for="uname">Email</label>
					</div>
					<div class="col-75">
						<input type="text" id="uname" placeholder="Nhập email hoặc số điện thoại" value="<?php echo $Uname;?>" name="uname" required>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
						<label for="psw">Mật khẩu</label>
					</div>
					<div class="col-75">
						<input type="password" id="pwd" placeholder="Mật khẩu từ 6 đến 32 ký tự" name="pwd" required>
					</div>
				</div>
				<div class="row" style="margin-top: 30px;">
					<div class="col-25">
					</div>
					<div class="col-75">
						<span class="error"><?php echo $login_Customer;?></span><br>
						<button type="submit" name="login" class="sub">Đăng nhập</button>
					</div>
				</div>
            </form>
        </div>

    	<div id="Register" class="tabcontent">
			<form id="form-regis" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="row">
					<div class="col-25">
						<label for="name">Họ tên</label>
					</div>
					<div class="col-75">
						<input type="text" id="nameRe" placeholder="Nhập họ tên ..." name="name" value="<?php echo $name;?>" required>
						<span class="error" id="nameReErr"><?php echo $nameErr;?></span><br>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
						<label for="company">Công ty</label>
					</div>
					<div class="col-75">
						<input type="text" id="companyRe" placeholder="Nhập công ty ..." name="company" value="<?php echo $company;?>" required>
						<span class="error" id="companyReErr"><?php echo $companyErr;?></span><br>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
						<label for="address">Địa chỉ</label>
					</div>
					<div class="col-75">
						<input type="text" id="address" placeholder="Nhập địa chỉ ..." name="address" value="<?php echo $company;?>" required>
						<span class="error" id="addressErr"><?php echo $addressErr;?></span><br>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
						<label for="SDT">SĐT</label>
					</div>
					<div class="col-75">
						<input type="text" id="sdtRe" placeholder="Nhập số điện thoại" name="SDT" value="<?php echo $sdt;?>" required>
						<span class="error" id="sdtReErr"><?php echo $sdtErr;?></span><br>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
						<label for="email">Email</label>
					</div>
					<div class="col-75">
						<input type="email" id="emailRe" placeholder="Nhập email" name="email" value="<?php echo $email;?>" required>
						<span class="error" id="emailReErr"><?php echo $emailErr;?></span><br>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
						<label for="pass">Mật khẩu</label>
					</div>
					<div class="col-75">
						<input type="password" id="passRe" placeholder="Mật khẩu từ 6-32 ký tự" name="pass" required>
						<span class="error" id="passReErr"><?php echo $passwordErr;?></span><br>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
						<label for="gender">Giới tính:</label>
					</div>
					<div class="col-75" style="margin-top: 15px;">
						<input type="radio" name="gender" id="gender" value="nam">Nam
						<input type="radio" name="gender" id="gender" value="nu">Nữ
						<span class="error"><?php echo $genderErr;?></span><br>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
					</div>
					<div class="col-75">
						<span class="error"><?php echo $insertCustomer;?></span><br>
						
						<button type="submit" name="submit" class="sub">Tạo tài khoản</button>
					</div>
				</div>
			</form>
    	</div>  	
        <div class="clear"></div>
    </div>
 </div>
	   
<script>
	// Get the modal
	var modal = document.getElementById('id01');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}

	function openTab(evt, cityName, C1) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
		
		document.getElementById(C1).style.display = "block";
			
	}
	
	document.getElementById("defaultOpen").click();
</script>