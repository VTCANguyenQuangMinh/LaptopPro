<?php
	   include 'inc/header.php';
 ?>
<?php

	 
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
		   <?php 
	      	    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
                   $tukhoa=$_POST['tukhoa'];//tukhoa ở header
                   $search_product=$product->search_product($tukhoa);
                }
	      			
	        ?>
    		    <div class="heading">
    		       <h3>Từ khóa tìm kiếm: <?php echo $tukhoa ?></h3>
    		    </div>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
		<?php
		if($search_product){
			while($result=$search_product->fetch_assoc()){

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
	      	echo "Sản phẩm này hiện chưa có trong danh mục";
	      	}
		?>
		</div>
    </div>
</div>
 <?php
      include 'inc/footer.php';
?>