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
	$br=new brand();
	$product = new product();
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
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
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
<!-- <style type="text/css">
/* .wrap{
	width:85%;
	margin:0 auto;
	padding:0 1%;
	background:#FFF;
} */
.images_1_of_4 {
	width: 22.8%;
	padding:1.5%;
	text-align:center;
	position:relative; 
}
</style> -->
</head>
<body>
  <div class="wrap">
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
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
								<?php
								$check_cart = $ct->check_cart();// hiển thị tiền, số lượng trên giỏ hàng trên header
								if ($check_cart) {
								 	$sum = Session::get("sum");
								 	$qty = Session::get("qty");
									echo $fm->format_currency($sum).'Đ'.' '.' SL: '.$qty;

								 }else {
								 	echo 'Emtyp';
								 } 
								
								 ?>

								</span>
							</a>
						</div>
			      </div>
				<?php 
				    if(isset($_GET['customer_id'])){
					$customer_id = $_GET['customer_id'];
					$delCart = $ct->del_all_data_cart();
					Session::destroy();// hủy phiên làm việc
				}
			    ?>  
		   <div class="login">
			<?php 
			$login_check = Session::get('customer_login');
			if ($login_check==false) {
				echo '<a href="login.php"><button type="button" class="btn btn-primary">Login</button></a>'; 
			}else {
				echo '<a href="?customer_id='.Session::get('customer_id').' "><button type="button" class="btn btn-primary">Logout</button></a>'; 
			}
			 ?>
		   </div>
		   <div class="clear"></div>
	    </div>
	    <div class="clear"></div>
    </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang chủ</a></li>
	  <li><a href="products.php">Sản phẩm</a> </li>
	  <li><a href="topbrands.php">Thương hiệu</a></li>
	    
	  <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	echo '';
	  }else {
	  	echo '<li><a href="profile.php">Thông tin</a></li>';
	  }
	   ?>
 
    <?php 
	  $customer_id = Session::get('customer_id'); 
	  $check_order = $ct->check_order($customer_id);
	  if ($check_order==true) {
	  	echo '<li><a href="order.php">Đơn hàng</a></li>';
	  }else {
	  	echo '';
	  }
	   ?>

    <?php 
	  $check_cart = $ct->check_cart();
	  if ($check_cart==true) {
	  	echo '<li><a href="cart.php">Giỏ hàng</a></li>';
	  }else {
	  	echo '';
	  }
	   ?>

    <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check) {
	  	echo '<li><a href="wishlist.php">Yêu thích</a> </li>';
	  }
	?>

	  <li><a href="contact.php">Liên hệ</a> </li>
	  <div class="clear"></div>
	</ul>
</div>