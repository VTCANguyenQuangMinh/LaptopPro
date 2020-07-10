<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
        header('Location:index.php');
	  }
?>

 <style>
     a, a:hover, a:active{
	    text-decoration: none;
    }
    h3.payment {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    }
    .wrapper_method {
    text-align: center;
    width: 80%;
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

    .space{
        height: 50px;
    }
    .wrapper_method h3 {
     margin-bottom: 20px;
    }

    @media only screen and (max-width: 480px) {
        .content {
            width: 100%;
            margin: auto;
        }

        .wrapper_method {
            width: 95%;
        }

        h3.payment {
            font-size: 15px;
        }

        .wrapper_method a{
            display: block;
            margin: 15px;
        }

        .space{
            height: 0;
        }
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
                <div class="space"></div>
                <a style="background:grey" href="cart.php"> Quay về</a>
            </div>

    	</div>
    	
    	</div>	
 	</div>

<?php 
	include 'inc/footer.php';
 ?>