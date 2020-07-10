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
 <?php
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);// khách hàng xác nhận đã nhận hàng
	}
	
	if(isset($_GET['cancel'])){
		$id = $_GET['cancel'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$cancel_order = $ct->cancel_order($id,$time,$price);// khách hàng xác nhận đã nhận hàng
   }
?>
<style type="text/css">
.tblone th {
  background: #1d71ab  none repeat scroll 0 0;
  color: #fff;
  font-size: 19px;
  padding: 5px 8px;
  text-align: center;
}
table.tblone tr:nth-child(2n){
	background:#fdf0f1;
	height:30px;
}
</style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h3>Đơn hàng</h3>

						<table class="tblone">
							<tr>
								<th width="10%">Mã đơn</th>
								<th width="20%">Ngày mua</th>
								<th width="35%">Tên sản phẩm</th>
								<th width="15%">Tổng tiền</th>
								<th width="10%">Trạng thái</th>
								<th width="10%">Xử lý</th>
							</tr>
							<?php
							$customer_id = Session::get('customer_id');  
							$get_cart_ordered = $ct->get_cart_ordered($customer_id);
							if($get_cart_ordered){
								// $i=0;
								while ($result = $get_cart_ordered->fetch_assoc()) {
								// $i++;
							 ?>
							<tr>
								<!-- <td><?php //echo $i; ?></td> -->
								<td><a href="orderdetails.php?orderid=<?php echo $result['id'] ?>"><?php echo $result['id'] ?></a></td>
								<td><?php echo $result['date_order']  ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td>
								<?php
								$total= $result['price'] * $result['quantity'];
								echo $fm->format_currency($total)." VNĐ";
								?>
								</td>
								<td>
								<?php 
									if ($result['status'] == '0') {
										echo "Đang chờ xử lý";
									}elseif($result['status'] == 1) {
								?>
								<span>Đã hủy</span>
								
								<?php
									}elseif($result['status']==2){
										echo 'Đang giao hàng';
									}elseif($result['status']==3){
										echo 'Giao thành công';
									}
									else{
										echo 'Giao thành công';
									}
								 ?>	

								</td>
								<?php 
								if ($result['status'] == '0') {
								 ?>
                                <td>
                                    <a href="?cancel=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Hủy đơn</a>
								</td>
								<?php 
								}elseif($result['status'] == '1') {
								 ?>

								<td><?php echo 'Đã hủy'; ?></td>
								<?php 
								}elseif($result['status'] == '2') {
								?>

								<td><?php echo '....'; ?></td>
								 <?php 
								 }elseif($result['status']== '3') {
								 ?>	
								 <td>
								 	<a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xác nhận</a>
								 </td>
								 <?php 
								}else{
								  ?>
								  
								<td><?php echo 'Đã xác nhận'; ?></td>
								<?php 
								}
								 ?>
							</tr>
							<?php 							
								}
							}
							 ?>
	
						</table>
						
					</div>
					<div class="shopping">
						<div class="shopleft" >
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<!-- <div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div> -->
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>
