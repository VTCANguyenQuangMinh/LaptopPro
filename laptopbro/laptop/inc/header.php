<?php
    include 'lib/session.php';
	Session::init();
	
?>
<?php
	
	include 'lib/database.php';
	include 'helpers/format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
		
	
	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	
	// $us = new user();
	$cs = new customer();
	$cat = new category();
	$br = new brand();
	$product = new product();
	
	include 'login.php';
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="shotcut icon" href="http://vtc.ac.vn/wp-content/uploads/2018/02/icon-1515340988.png" sizes="192x192">

<link href="css/Style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu02.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css\cssForOfflinePayment1.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>

</head>
<body onload="showForm()">
  	
  	<div class="wrap">
		<!-- Header for PC -->
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logochinh.png" alt="" /></a>
			</div>
			<div class="header_top_right">
				<div class="search_box">
					<form action="search.php" method="POST">
						<!-- <input type="text" placeholder="tìm kiếm sản phẩm" name="tukhoa">
						<input type="submit" name="search_product" value="SEARCH"> -->
						<div class="input-group">
							<input type="text" class="form-control" placeholder="tìm kiếm sản phẩm" name="tukhoa">
							<div class="input-group-btn">
								<button class="btn btn-warning" type="submit" name="search_product">
									<span class="glyphicon glyphicon-search"></span> Search
								</button>
							</div>
						</div>
					</form>
				</div>
				<a href="cart.php" title="View my shopping cart" rel="nofollow">
					<div class="shopping_cart">
						<div class="cart">
							<span class="cart_title">Cart</span>
							<span class="no_product">
								<?php
									$check_cart = $ct->check_cart();
									if ($check_cart) {
										$qty = Session::get("qty");
										echo $qty;

									}else {
										echo 'Empty';
									} 
									
								?>
							</span>
						</div>
					</div>
				</a>
				<?php 
					if(isset($_GET['customer_id'])){
						$customer_id = $_GET['customer_id'];
						$delCart = $ct->del_all_data_cart();
						Session::destroy();
					}
				?>  
				<div class="login">
					<?php 
						$login_check = Session::get('customer_login');
						if ($login_check==false) {
							?><button id="btn-account" type="button" class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'">Login</button>
						<?php
						}else {
							echo '<a href="logout.php"><button type="button" class="btn btn-primary">Logout</button></a>'; 
						}
					
					?>
				</div>
				<div class="clear"></div>
			</div>
	    	<div class="clear"></div>
		</div>
	
		<!-- Header for mobile -->
		<div class="wrapMobile">
			<div class="topHeaderMobile">
				<div class="loginMB">
					<?php 
						$login_check = Session::get('customer_login');
						if ($login_check==false) {
							?><button id="btn-account" type="button" class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'">
								<i class="fas fa-user"></i>
							</button>
						<?php
						}else {
							echo '<a href="logout.php"><button type="button" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i></button></a>'; 
						}
					
					?>

				</div>
				<div class="LogoMB" >
					<img src="images/logochinh.png" alt="" style="width:100%;">
				</div>
				<div class="CartMB" >
					<a href="cart.php" title="View my shopping cart" rel="nofollow">
						<i style="font-size: 30px;" class="fas fa-cart-plus"></i>
					</a> 
				</div>
			</div>
			<div class="searchMobile">
				<div class="search_box">
					<form action="search.php" method="POST">
						<!-- <input type="text" placeholder="tìm kiếm sản phẩm" name="tukhoa">
						<input type="submit" name="search_product" value="SEARCH"> -->
						<div class="input-group">
							<input type="text" class="form-control" placeholder="tìm kiếm sản phẩm" name="tukhoa">
							<div class="input-group-btn">
								<button class="btn btn-warning" type="submit" name="search_product">
									<span class="glyphicon glyphicon-search"></span> Search
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End Top Header -->
		<div class="menu">
			<a href="index.php">Trang chủ</a>
			<a href="products.php">Sản phẩm</a> 
			<a href="topbrands.php">Thương hiệu</a>
				
			<?php 
			$login_check = Session::get('customer_login');
			if ($login_check==false) {
				echo '';
			}else {
				echo '<a href="profile.php">Thông tin</a>';
			}
			?>
		
			<?php 
			$customer_id = Session::get('customer_id'); 
			$check_order = $ct->check_order($customer_id);
			if ($check_order==true) {
				echo '<a href="orderdetails.php">Đơn hàng</a>';
			}else {
				echo '';
			}
			?>

			<?php 
			$check_cart = $ct->check_cart();
			if ($check_cart==true) {
				echo '<a href="cart.php">Giỏ hàng</a>';
			}else {
				echo '';
			}
			?>

			<?php 
			$login_check = Session::get('customer_login');
			if ($login_check) {
				echo '<a href="wishlist.php">Yêu thích</a>';
			}
			?>

			<a href="contact.php">Liên hệ</a> 

		</div>