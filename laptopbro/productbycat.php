<?php
	   include 'inc/header.php';
 ?>
<?php
     
	 if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
		 echo "<script> window.location = '404.php' </script>";
		 
	 }else {
		 $id = $_GET['catid']; // Lấy catid ở trang details.php
	 }
	 
   ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
		   <?php 
	      	    $name_cat = $cat->get_name_by_cat($id);
	      	    if ($name_cat) {
	      		while ($result_name = $name_cat->fetch_assoc()) {
	      			
	        ?>
    		    <div class="heading">
    		       <h3><?php echo $result_name['catName'] ?></h3>
    		    </div>
			<?php
				}
			}
			?>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
		<?php
		$productbycat=$cat->get_product_by_cat($id);
		if($productbycat){
			while($result=$productbycat->fetch_assoc()){

		?>
			<div class="grid_1_of_4 images_1_of_4">
				<a href="details.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
				<h2><?php echo $fm->textShorten($result['productName'],30) ?></h2>
				<p><?php echo $fm->textShorten($result['product_desc'],40) ?></p>
				<p><span class="price"><?php echo $result['price'].' VND' ?></span></p>
				<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Chi tiết</a></span></div>
			</div>
		<?php 
			}
		}
		else{
	      	echo "Sản phẩm này hiện chưa có trong danh mục";
	      	}
		?>
		</div>
    </div>
</div>
 <?php
      include 'inc/footer.php';
?>