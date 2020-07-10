<?php 

	include 'inc/header.php';
	include 'inc/slider.php';
?>	
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm nối bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="section group1">
	      	<?php 
	      	$product_featheread = $product->getproduct_featheread();
	      	if($product_featheread){
	      		while ($result = $product_featheread->fetch_assoc()) {
				$Pdname = substr($result['productName'],  0, 40); 	
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php?proid=<?php echo $result['productId'] ?>">
						<div>
							<img src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
						</div>

						<div class="hdiv1">
							<h2><?php echo $Pdname ?></h2>
						</div>

						<div class="hdiv">
						<p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p>
						</div>

						<div class="hdiv">
						<p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VND" ?></span></p>
						</div>

					</a>
				</div>

				
				<?php 
				}
				}
				 ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group1">
			<?php 
			$product_new = $product->getproduct_new();
			if($product_new){
				while ($result_new = $product_new->fetch_assoc()) {
				$Pdnew = substr( $result_new['productName'],  0, 40) . "..."; 	  	
				?>
				
				<div class="grid_1_of_4 images_1_of_4">
				<a href="details.php?proid=<?php echo $result_new['productId'] ?>">
					<div>
					<img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" />
					</div>
					<div class="hdiv1" style="height: 55px;">
					<h2><?php echo $Pdnew?></h2></div>
					<div class="hdiv">
					<p><?php echo $fm->textShorten($result_new['product_desc'], 50) ?></p></div>
					<div class="hdiv">
					<p><span class="price"><?php echo $fm->format_currency($result_new['price'])." VND" ?></span></p></div>
				</a>
				</div>
				
			<?php 
				}
				}
			?>
		</div>
    </div>
</div>
<?php 

	include 'inc/footer.php';
?>


	