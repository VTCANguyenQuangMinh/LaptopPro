<?php
	   include 'inc/header.php';
 ?>
 <?php
     
	 if(isset($_POST['submit_support'])){
		$insertsupport=$cs->insert_support();// thêm liên hệ
	}
?>
 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
				<p>Laptop BRO là website chuyên cung cấp những dòng laptop cao cấp, chất lượng, giá siêu siêu rẻ hàng đầu Việt Nam. Chúng tôi luôn cam kết, đảm bảo
				răng sản phẩm trên website là những sản phẩm thật, mới có thương hiệu nổi tiếng nhất hiện nay. Khách hàng có thể yên tâm khi mua laptop trên
				hệ thống. Khi khách hàng đến với laptop BRO các bạn sẽ được phục vụ một cách chu đáo nhất, dịch vụ đổi trả dễ dàng, bảo hành trọn đời cùng với nhất
				nhiều quà tặng hấp dẫn khi mua hàng ở laptop BRO.</p>
  				<p>Chúng tôi luôn sẵn sàng hỗ trợ các bạn mọi lúc, mọi lên 24/7 khi các bạn cần.
				  Nếu gặp trục trặc, khó khăn gì hãy gửi form liên hệ cho laptop BRO.
				  Chúng tôi sẽ phản hồi cho bạn nhanh nhất có thể, trong trường hợp do một số lý do bất khả kháng
				  mà laptop BRO phản hồi chậm thì mong bạn thông cảm. Lưu ý email phản hồi có thể nằm trong mục spam
				  nên bạn hãy kiểm tra thật kỹ nhé ! Nếu vẫn chưa nhận được email phản hồi bạn có thể liên hệ trực tiếp tới email
				  hoặc hotline chính của chúng tồi ở bên dưới. </p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Liên hệ với chúng tôi</h3>
					  <?php
			         if(isset($insertsupport)){
				      echo $insertsupport;
			         }
			        ?>
					    <form action="" method="POST">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" class="form-control" name="supportname" placeholder="Nhập tên của bạn..."></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" class="form-control" name="supportemail" placeholder="Nhập email của bạn..."></span>
						    </div>
						    <div>
						     	<span><label>Số điện thoại</label></span>
								 <span><input type="text" class="form-control" name="supportphone" placeholder="Nhập số điện thoại của bạn..."></span>
						    </div>
						    <div>
						    	<span><label>Nội dung</label></span>
						    	<span><textarea style="resize:none;" placeholder="Yêu cầu cần hỗ trợ..." name="yeucau"></textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit_support" value="SUBMIT"></span>
						   </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			    <div class="company_address">
				     	<h3>Thông tin</h3>
						<p>Địa chỉ : VTCA, 18 Tam Trinh,</br> Hai Bà Trưng, Hà Nội</p>
						<p>Vietnamese</p>
						<p>MST : 0123456789</p>
				   		<p>Hotline : (+84) 0359458586</p>
				 	 	<p>Email : <span>laptopBRO@.com</span></p>
						<p>Website : <span>http://www.laptopBRO.com</span></p>
				   		<p>Follow on : <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				</div>
		</div>    	
    </div>
 </div>
 <?php
      include 'inc/footer.php';
?>