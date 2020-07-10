<?php
	   include 'inc/header.php';
 ?>
<?php
     
	 if(!isset($_GET['brandid']) || $_GET['brandid'] == NULL){
		 echo "<script> window.location = '404.php' </script>";
		 
	 }else {
		 $id = $_GET['brandid']; // Lấy catid trên host
	 }
	 
   ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
		   <?php 
	      	    $name_brand = $br->get_name_by_brand($id);
	      	    if ($name_brand) {
	      		while ($result_name = $name_brand->fetch_assoc()) {
	      			
	        ?>
    		    <div class="heading">
    		       <h3><?php echo $result_name['brandName'] ?></h3>
    		    </div>
			<?php
				}
			}
			?>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
		<?php
		$productbybrand=$br->get_product_by_brand($id);
		if($productbybrand){
			while($result=$productbybrand->fetch_assoc()){

		?>
			<div class="grid_1_of_4 images_1_of_4">
				<a href="details.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
				<h2><?php echo $result['productName'] ?></h2>
				<p><?php echo $fm->textShorten($result['product_desc'],50) ?></p>
				<p><span class="price"><?php echo $result['price'].' VND' ?></span></p>
				<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
			</div>
		<?php 
			}
		}
		else{
	      	echo "Thương hiệu này hiện chưa có sản phẩm";
	      	}
		?>
		</div>
    </div>
</div>
 <?php
      include 'inc/footer.php';
?>