<?php 
	include 'inc/header.php';

	// include 'inc/slider.php';
 ?>
<?php 
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       $customer_id = Session::get('customer_id');
       $insertOrder = $ct->insertOrder($customer_id);
       $delCart = $ct->del_all_data_cart();
       header('Location:success.php');
    }
?>
 
 <div class="main">
    <div class="content">
    	<div class="cartoption">
			<h3>Thanh toán offline</h3>
			<div class="khachhang">
				<?php 
					$id = Session::get('customer_id');
					$get_customers = $cs->show_customers($id);
					if ($get_customers) {
					while ($result = $get_customers->fetch_assoc()) {
							
				?>
				<div class="diachi">
					<h3>Địa chỉ người nhận</h3>
					<div>
						<p><span>Tên : <?php echo $result['name'] ?></span></p>
						<p><span>Email :</span> <?php echo $result['email'] ?></p>
						<p><span>Điện thoại :</span> <?php echo $result['phone'] ?></p>
						<p><span>Địa chỉ : </span><?php echo $result['address'] ?> </p>
						<a style="color:blue;" href="editprofile.php">Thay đổi</a>
					</div>
				</div>
				<?php
					}
				}
				?>
				<div class="thanhtoan">
					<h3>Hình thức thanh toán</h3>
					<div>
						<p>Thanh toán tiền mặt khi nhận hàng</p>
					</div>
				</div>
			</div>

			<div class="cartpage">
				<h3>Giỏ hàng</h3>
				<?php
					if(isset($delcart)){
					echo $delcart; }
				?>
				<table class="tblone">
					<tr>
						<th width="0%">Stt</th>
						<th width="35%">Tên sản phẩm</th>
						<th width="15%">Ảnh</th>
						<th width="20%">Giá</th>
						<th width="10%">Số lượng</th>
						<th width="20%">Tạm tính</th>
					</tr>
					<?php 
						$get_product_cart = $ct->get_product_cart();
						if($get_product_cart){
						$subtotal = 0;
						$qty = 0;
						$i=0;
						while ($result = $get_product_cart->fetch_assoc()) {
						$i++;			
						?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $result['productName'] ?></td>
						<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
						<td><?php echo $fm->format_currency($result['price']).' VND' ?></td>
						<td><?php echo $result['quantity'] ?></td>
						<td>
						<?php
							$total= $result['price'] * $result['quantity'];
							echo $fm->format_currency($total)." VNĐ";
						?></td>
					</tr>
						<?php
						$subtotal += $total;
						$qty = $qty + $result['quantity'];
						}
						}
						?>
				</table>
				<?php
					$check_cart = $ct->check_cart();
					if ($check_cart) {
				?>
				<table class="PaymentOffline">
					<tr>
						<th>Tổng giá : </th>
						<td>
						<?php echo $fm->format_currency($subtotal).' VND';
							Session::set('sum',$subtotal);
							Session::set('qty',$qty);
						?>
						</td>
					</tr>

					<tr>
						<th>Phí vận chuyển : </th>
						<td>20.000 VNĐ </td>
					</tr>
								
					<tr>
						<th>Tổng cộng :</th>
						<td><?php 
						$grandTotal = $subtotal + 20000;
						echo $fm->format_currency($grandTotal).' VND';
						?> </td>
					</tr>
				</table>
				<?php 
					}else {
						echo 'Your cart is Empty ! Please Shopping now';
					}
				?>
			</div>
			<center style="padding-bottom: 20px;"><a href="?orderid=order" class="btn btn-danger">Đặt hàng</a></center>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	   include 'inc/footer.php';
 ?>