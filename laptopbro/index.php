<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
 ?>	
 <style type="text/css">
 .xemthem{
	cursor: pointer;
    display: inline-block;
    width: 200px;
    color: rgb(24, 158, 255);
    font-size: 13px;
    text-align: center;
    margin: 20px 0px;
    padding: 7px 16px;
    border-radius: 5px;
    border-width: 1px;
    border-style: solid;
    border-color: initial;
    border-image: initial;
 }
.xemthem:hover{
	background: rgb(24, 158, 255);
	color:white;
	text-decoration: none;
}
 </style>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm nối bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		    <div class="section group">
	      	   <?php 
	      	   $product_featheread = $product->getproduct_featheread();
	      	   if($product_featheread){
	      	   while ($result = $product_featheread->fetch_assoc()) {	      	
			   ?>
				 
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $fm->textShorten($result['productName'],30) ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'], 40) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price']).' VND' ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				  }
				}
				 ?>
			    <div style="text-align: center;"><a href="products.php" class="xemthem">Xem thêm</a></div>
			</div>

		<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php 
	      	$product_new = $product->getproduct_new();
	      	if($product_new){
	      		while ($result_new = $product_new->fetch_assoc()) {
	      			      	
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
					 <h2><?php echo $fm->textShorten($result_new['productName'],30) ?></h2>
					 <p><?php echo $fm->textShorten($result_new['product_desc'], 40) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result_new['price'])." VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php 
				}
				}
			?>
			<div style="text-align: center;"><a href="products.php" class="xemthem">Xem thêm</a></div>
			</div>
			<!-- phân trang -->
			<!-- <div class="pagination">
			<?php
			// $product_all=$product->get_all_product();
			// $product_count = mysqli_num_rows($product_all);
			// $product_button = ceil($product_count/4);
			// $i=1;
			// // echo '<p>Trang: </p>';
			// for($i=1;$i<=$product_button;$i++){
			//   echo '<a class="btn btn-primary" style="margin:0 5px;" href="index.php?trang='.$i.'">'.$i.'</a>';
			// }
			?>
			</div> -->
    </div>
 </div>
<?php 
	include 'inc/footer.php';
 ?>


	