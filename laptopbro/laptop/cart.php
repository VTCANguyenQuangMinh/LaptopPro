<?php
    // cần sửa lại trang này !!!!
	   include 'inc/header.php';
 ?>
 <?php
    if(isset($_GET['cartid'])){
	$cartid=$_GET['cartid'];
	$del_cart=$ct->del_product_cart($cartid);// xóa giỏ hàng
	} 

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
		$cartId = $_POST['cartId'];
		$proId = $_POST['proId'];
        $quantity = $_POST['quantity'];
		$update_quantity_Cart = $ct -> update_quantity_Cart($proId,$cartId, $quantity); // thay đổi số lượng trong giỏ hàng
		if ($quantity <= 0) {
    		$delcart = $ct->del_product_cart($cartId);// số lượng hết xóa giỏ hàng
    	}
    } 
 ?>
 <?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h3>Giỏ hàng</h3>
					<?php 
			    	if (isset($update_quantity_Cart)) {
			    		echo $update_quantity_Cart;
			    	}
			    	 ?>
					 <?php
					 if(isset($del_cart)){
						 echo $del_cart;
					 }
					 ?>
						<table class="tblone">
							<tr>
							    <th width="0%">STT</th>
								<th width="30%">Tên sản phẩm </th>
								<th width="10%">Ảnh</th>
								<th width="15%">Giá</th>
								<th width="20%">Số lượng</th>
								<th width="15%">Tạm tính</th>
								<th width="10%">Xử lý</th>
							</tr>
							<?php 
	      	                  $get_product_cart = $ct->get_product_cart();
	      	                  if($get_product_cart){
								 $i = 0;
								 $subtotal = 0;
								 $qty = 0;
	      	                     while ($result = $get_product_cart->fetch_assoc()) {	
									   $i++;      	
			                 ?>
							<tr>
							    <td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><a href="details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></a></td>
								<td><?php echo $fm->format_currency($result['price'])." VNĐ" ?></td>
								<td>
									<form action="" method="post">
									    <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>"/>
										<input type="hidden" name="proId" min="0" value="<?php echo $result['productId'] ?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>
								<?php
								$total= $result['price'] * $result['quantity'];
								echo $fm->format_currency($total)." VNĐ";
								?></td>
								<td><a href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
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
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng giá :</th>
								<td><?php 
								echo $fm->format_currency($subtotal)." VNĐ";
								Session::set('sum',$subtotal);
								Session::set('qty',$qty);
								?></td>
							</tr>
							<tr>
								<th>Phí vận chuyển :</th>
								<td>20.000 VNĐ</td>
							</tr>
							<tr>
								<th>Tổng cộng :</th>
								<td>
								<?php
								$gtotal = $subtotal + 20000 ;
								echo $fm->format_currency($gtotal)." VNĐ";
								?>
								</td>
							</tr>
					   </table>
					   <?php 
						}else {
							echo 'Giỏ của bạn trống trơn ! Hãy mua sắm ngay bây giờ';
						}
					    ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	   include 'inc/footer.php';
 ?>