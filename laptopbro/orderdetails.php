<?php
    // cần sửa lại trang này !!!!
	   include 'inc/header.php';
 ?>

 <?php 
	$login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
 ?>
 <?php
    if(!isset($_GET['orderid']) || $_GET['orderid'] == NULL){
        echo "<script> window.location = 'order.php' </script>";
        
    }else {
        $id = $_GET['orderid']; // Lấy orderid ở trang order.php
    } 
 ?>
 <style type="text/css">
.khachhang{
    background: #f1f1f1;
    overflow: hidden;
    margin-bottom: 20px;
}
.diachi{
    width: 31%;
    display: block;
    vertical-align: top;
    margin-top: 20px;
    float: left;
    margin-left: 1%;
    margin-right: 1%;
    margin-bottom: 20px;
}
h3{
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 15px;
    font-size: 15px;
    text-transform: uppercase;
    color: #242424;
}
.diachi>div{
    padding: 5px 10px;
    background: #fff;
    border-radius: 4px;
    min-height: 110px;
    line-height: 1.38;
}
p.name{
    font-weight: 500;
    color: #242424;
    text-transform: uppercase;
    margin-bottom: 10px;
}
p{
    font-size: 13px;
    margin-bottom: 0;
}
.giaohang{
    width: 31%;
    display: block;
    vertical-align: top;
    margin-top: 20px;
    float: left;
    margin-right: 1%;
    margin-bottom: 20px;
}
.giaohang>div{
    padding: 5px 10px;
    background: #fff;
    border-radius: 4px;
    min-height: 110px;
    line-height: 1.38;
}
.thanhtoan{
    width: 31%;
    display: block;
    vertical-align: top;
    margin-top: 20px;
    float: left;
    margin-right: 1%;
    margin-bottom: 20px;
}
.thanhtoan>div{
    padding: 5px 10px;
    background: #fff;
    border-radius: 4px;
    min-height: 110px;
    line-height: 1.38; 
}
</style>
<div class="main">
    <div class="content">
    	<div class="cartoption">
        <?php 
            $show_orderdetails = $ct->show_orderdetails($id);
            if($show_orderdetails){
            while ($result = $show_orderdetails->fetch_assoc()) {

		?>
        <h3>Chi tiết đơn hàng: <?php echo $id ?></h3>
        <div class="khachhang">

            <div class="diachi">
                <h3>Địa chỉ người nhận</h3>
                <div>
                    <p class="name"><?php echo $result['name'] ?></p>
                    <p><span>Email :</span> <?php echo $result['email'] ?></p>
                    <p><span>Điện thoại :</span> <?php echo $result['phone'] ?></p>
                    <p><span>Địa chỉ : </span><?php echo $result['address'] ?> </p>
                </div>
            </div>

            <div class="giaohang">
                <h3>Hình thức giao hàng</h3>
                <div>
                    <p><span>Ngày đặt hàng : </span><?php echo $result['date_order'] ?></p>
                    <br>
                    <p><span>Phí vận chuyển : </span> 20.000 VNĐ</p>
                    <br>
                    <p>Bạn sẽ nhận hàng trong vòng 3 ngày tới</p>
                 </div>
            </div>

            <div class="thanhtoan">
                <h3>Hình thức thanh toán</h3>
                <div>
                    <p>Thanh toán tiền mặt khi nhận hàng</p>
                </div>
            </div>
        </div>

		<div class="cartpage">
            <table class="tblone">
				<tr>
			        <th width="40%">Tên sản phẩm</th>
					<th width="10%">Ảnh</th>
					<th width="20%">Giá</th>
					<th width="10%">Số lượng</th>
                    <th width="20%">Tạm tính</th>
				</tr>

				<tr>
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
					   }
					}
					?>
			</table>
            <table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Phí vận chuyển :</th>
								<td>20.000 VNĐ</td>
							</tr>
							<tr>
								<th>Tổng cộng :</th>
								<td>
								<?php
								$gtotal = $total + 20000 ;
								echo $fm->format_currency($gtotal)." VNĐ";
								?>
								</td>
							</tr>
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