<?php
	   include 'inc/header.php';
 ?>

 <div class="main">
    <div class="content">
	    <div class="content_top">
    		<div class="heading">
    		<h3>Tất cả sản phẩm</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
		<?php 
	      	$show_all_product = $product->show_all_product();
	      	if($show_all_product){
	      		while ($result_all = $show_all_product->fetch_assoc()) {
	      			      	
	    ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_all['image'] ?>" alt="" /></a>
					 <h2><?php echo $fm->textShorten($result_all['productName'],30) ?></h2>
					 <p><?php echo $fm->textShorten($result_all['product_desc'], 40) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result_all['price'])." VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_all['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
		<?php 
				}
				}
		?>
		</div>
		<div class="pagination" >
			<?php
			$product_all=$product->get_all_product();
			$product_count = mysqli_num_rows($product_all);
			$product_button = ceil($product_count/12);
			$i=1;
			// echo '<p>Trang: </p>';
			for($i=1;$i<=$product_button;$i++){
              echo '<a class="btn btn-primary" style="margin:0 5px;" href="products.php?trang='.$i.'">'.$i.'</a>';
			}
			?>
		</div>
    </div>
 </div>
 <?php
      include 'inc/footer.php';
?>