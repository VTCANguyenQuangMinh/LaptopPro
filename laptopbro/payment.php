<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
?>

 <style>
    h3.payment {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    }
    .wrapper_method {
    text-align: center;
    width: 550px;
    margin: 0 auto;
    border: 1px solid #666;
    padding: 20px;
    /* margin: 20px; */
    background: cornsilk;
    border-radius: 5px;
    }
    .wrapper_method a {
    padding: 10px;
    background: red ;
    color: #fff;
    border-radius: 5px;
    
    }
    .wrapper_method h3 {
     margin-bottom: 20px;
    }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
                <!-- <h3>Phương Thức Thanh Toán</h3> -->
    		</div>
    		<div class="clear"></div>
            <div class="wrapper_method">
                <h3 class="payment">Chọn phương thức thanh toán của bạn</h3>
                <a href="offlinepayment.php">Thanh Toán Offline</a>
                <a href="onlinepayment.php">Thanh Toán Online</a>
                <br><br><br>
                <a style="background:grey" href="cart.php"> Quay về</a>
            </div>

    	</div>
    	
    	</div>	
 	</div>

<?php 
	include 'inc/footer.php';
 ?>