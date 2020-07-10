<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	$login_check = Session::get('customer_login');
	if ($login_check) {
		header('Location:index.php'); 
	}
?>

<?php
     
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $cs -> insert_customer($_POST); // đăng ký
    }
 ?>
 <?php 
 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $login_Customer = $cs -> login_customer($_POST); // đăng nhập
    }
 ?>
 <style type="text/css">
.register_account form select{
	width: 340px;
}
 </style>
 <div class="main">
    <div class="content">
    	<div class="login_panel">
        	<h3>Đăng nhập</h3>
        	<p>Mời nhập thông tin</p>
        	<?php 
    		if (isset($login_Customer)) {
    			echo $login_Customer;
    		}
    		 ?>
        	<form action="" method="POST">
                	<input type="text" name="email" class="form-control" placeholder="Nhập email..." >
                    <input type="password" name="password" class="form-control" placeholder="Nhập password..." >
                 
                 <!-- <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p> -->
                    <div class="buttons"><div><input type="submit" name="login" class="grey" value="Đăng nhập" style="background: #ffffff;"></div>
					</div>
            </form>
        </div>

    	<div class="register_account">
    		<h3>Đăng ký tài khoản</h3>
    		<?php 
    		if (isset($insertCustomer)) {
    			echo $insertCustomer;
    		}
    		 ?>
    		<form action="" method="POST">
		   	<table>
		   		<tbody>
				    <tr>
				       <td>
							<div>
							  <input type="text" class="form-control" name="name" placeholder="Nhập Name...">
							</div>
							
							<div>
							   <input type="text" class="form-control" name="city" placeholder="Nhập thành phố..." >
							</div>
							
							<div>
								<input type="text" class="form-control" name="zipcode" placeholder="Nhập Zipcode...">
							</div>
							<div>
								<input type="text" class="form-control" name="email" placeholder="Nhập E-Mail...">
							</div>
		    			</td>

		    	        <td>
						    <div>
							    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ...">
						    </div>

		    		        <div>
						      <select id="country"  name="country" onchange="change_country(this.value)" class="form-control">
							     <option value="VietNam">Việt Nam</option>
							     <option value="USA">Mỹ</option>  
								 <option value="Canada">Canada</option>      
		                      </select>
				            </div>		        
		                    <div>
		                        <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại...">
		                    </div>
				  
				             <div>
					           <input type="password" class="form-control" name="password" placeholder="Nhập Password..." style="width: 100%;height: 33px;margin-top: 7px;">
				           </div>
		    	        </td>
		            </tr> 
		        </tbody>
			</table> 
		    <div class="search"><div><input type="submit" name="submit" class="grey" value="Tạo tài khoản" style="background: #ffffff;"></div>
		    </div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
        <div class="clear"></div>
    </div>
 </div>


<?php 
	include 'inc/footer.php';
 ?>
