</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>THÔNG TIN</h4>
						<ul>
						<li><a href="contact.php">Về chúng tôi</a></li>
						<li><a href="contact.php">Dịch vụ</a></li>
						<li><a href="contact.php"><span>Chính sách</span></a></li>
						<li><a href="contact.php"><span>Liên hệ</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>GIỚI THIỆU</h4>
						<ul>
						<li><a href="index.php">Website</a></li>
						<li><a href="index.php">Sản phẩm</a></li>
						<li><a href="index.php">Thương hiệu</a></li>
						<li><a href="contact.php"><span>Hỗ trợ</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>GIỎ HÀNG CỦA TÔI </h4>
						<ul>
							<li><a href="Login.php">Đăng nhập</a></li>
							<li><a href="index.php">Xem giỏ hàng</a></li>
							<li><a href="index.php">Đặt mua</a></li>
							<li><a href="contact.php">Giúp đỡ</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>LIÊN HỆ</h4>
						<ul>
							<li><span>0359458586</span></li>
							<li><span>laptopBRO@gmail.com</span></li>
						</ul>
						<div class="social-icons">
							<h4>THEO DÕI CHÚNG TÔI</h4>
					   		  <ul>
							      <li class="facebook"><a href="https://tamsuvegiadinh.blogspot.com/" target="_blank"> </a></li>
							      <li class="twitter"><a href="https://tamsuvegiadinh.blogspot.com/" target="_blank"> </a></li>
							      <li class="googleplus"><a href="https://tamsuvegiadinh.blogspot.com/" target="_blank"> </a></li>
							      <li class="contact"><a href="contact.php" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>Coppy right @2019 with laptopBRO </p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>
