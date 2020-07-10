<?php
	   include 'inc/header.php';
 ?>
 <?php 
	if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
        echo "<script> window.location = '404.php' </script>";
        
    }else {
        $id = $_GET['proid']; // Lấy productid trên host
    }

	$customer_id = Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $productid = $_POST['productid'];
        $insertWishlist = $product -> insertWishlist($productid, $customer_id); // thêm vào yêu thích
	}
	
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $quantity = $_POST['quantity'];
		$insertCart = $ct -> add_to_cart($id, $quantity); // thêm vào giỏ hàng
	} 
	
	if(isset($_POST['binhluan_submit'])){
		$binhluan_insert=$cs->insert_binhluan();// bình luận
	}
 ?>
 <div class="main">
    <div class="content">
    <div class="section group">
	<?php 
    		$get_product_details = $product->get_details($id);
    		if ($get_product_details) {
    			while ($result_details = $get_product_details->fetch_assoc()) {
    				
    			
    ?>
		<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
					</div>
			<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName'] ?></h2>
					<p><?php echo $result_details['product_desc'] ?></p>					
					<div class="price">
						<p>Price: <span><?php echo $fm->format_currency($result_details['price'])." "." VNĐ" ?></span></p>
						<p>Thương hiệu:<span><?php echo $result_details['brandName'] ?></span></p>
						<p>Loại CPU: <span><?php echo $result_details['catName'] ?></span></p>
					</div>
				<div class="add-cart">
					<form action=" " method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>	
					 <?php 
						if (isset($insertCart )) {
							echo '<span style="color:red; font-size:18px;">Sản phẩm đã được bạn thêm vào giỏ hàng</span>';
						}
					 ?>	 
					 <?php 
						if (isset($insertCart)) {
							echo $insertCart;
						}
					 ?>	 	
				</div>
				<div class="add-cart">
					<div class="button_details">

					<form action="" method="POST">
					<input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>
					<?php
					$login_check = Session::get('customer_login'); 
						if($login_check){
							
							echo '<input type="submit" class="buysubmit" name="wishlist" value="Lưu vào yêu thích" />';
						}else{
							echo '';
						}	
					?>
					<?php 
						if(isset($insertWishlist)) {
							echo $insertWishlist;
						}
					?>
					</form>

					</div>
					<div class="clear"></div>
				</div>
		    </div>
			<div class="product-desc">
			    <h2>Chi tiết sản phẩm</h2>
			    <p><?php echo $result_details['product_desc'] ?></p>	
	        </div>		
	    </div>
		<?php
		}
	    } 
		?>
				<div class="rightsidebar span_3_of_1">
					<h3>Loại CPU</h3>
					<ul>
					<?php 
						$getall_category = $cat->show_category_fontend();
							if ($getall_category) {
								while ($result_allcat = $getall_category->fetch_assoc()) {
									
								
						 ?>
				      <li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
					  <?php
								}
							}
					  ?>
    				</ul>
    	
 				</div>
				 <div class="rightsidebar span_3_of_1">
					<h3>Thương hiệu</h3>
					<ul>
					<?php 
						$getall_brand = $br->show_brand_fontend();
							if ($getall_brand) {
								while ($result_allbrand = $getall_brand->fetch_assoc()) {
									
								
						 ?>
				      <li><a href="productbybrand.php?brandid=<?php echo $result_allbrand['brandId'] ?>"><?php echo $result_allbrand['brandName'] ?></a></li>
					  <?php
								}
							}
					  ?>
    				</ul>
    	
 				</div>

 	</div>
	<div class="binhluan">
	    <div class="row" style="margin-left:5px;">
		    <div class="col-md-6">
			   <h4>Bình luận sản phẩm</h4>
			   <?php
			   if(isset($binhluan_insert)){
				   echo $binhluan_insert;
			   }
			   ?>
			   <form action="" method="POST">
			        <p><input type="hidden" value="<?php echo $id ?>" name="product_id_binhluan"></p>
			        <p><input type="text" placeholder="Điền tên" class="form-control" name="tennguoibinhluan"></p>
					<p><textarea style="resize:none;" rows="5" placeholder="bình luận..." class="form-control" name="binhluan"></textarea></p>
					<p><input type="submit" name="binhluan_submit" class="btn btn-success" value="Submit"></p>
			   </form>
			</div>
		</div>
	</div> 
 	</div>
<?php
      include 'inc/footer.php';
?>