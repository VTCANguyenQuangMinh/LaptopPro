<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php 
  // orderid ở offlinepayment.php
	if(isset($_GET['oderid']) AND $_GET['orderid'] == 'order'){
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);//thêm đơn hàng
        $delCart = $ct->del_all_data_cart();// xóa dl trên giỏ hàng
        header('Location:success.php');
    }
 ?>
 <style type="text/css">
	.box_left {
    width: 50%;
    border: 1px solid #666;
    float: left;
    padding: 4px;	

	}
 	.box_right {
    width: 47%;
    border: 1px solid #666;
    float: right;
    padding: 4px;
	}
	.a_order {
    background: #653092;
    color: aliceblue;
    padding: 10px;
    font-size: 25px;
    border-radius: none;
    cursor: pointer;
	}
}
</style>

<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<h3>Đặt hàng thành công</h3>
            <?php
                $customer_id = Session::get('customer_id'); 
                $get_amount = $ct->getAmountPrice($customer_id);//tính tổng số tiền của đã đặt mua
                if ($get_amount) {
                    $amount = 0;
                    while ($result = $get_amount->fetch_assoc()) {
                        $price = $result['price'];
                        $amount += $price;
                    }
                }
             ?>
            <p class="success_note">
            Tổng giá trị bạn đã mua: 
            <?php 
                $total = 20000 + $amount;
                echo $fm->format_currency($total).' VNĐ';
             ?></p>
            <p class="success_note">Chúng tôi sẽ liên hệ với bạn sớm nhất có thể, xem chi tiết đặt hàng tại <a href="order.php">Bấm vào đây</a></p>
 		</div>
 	</div>
 	
 </div>
</form>
<?php 
	include 'inc/footer.php';
 ?>