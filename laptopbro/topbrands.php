<?php
	   include 'inc/header.php';
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
    		<h3>Dell</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
		    <?php 
	      	   $getbrandDell = $br->getbrandDell();
	      	   if($getbrandDell){
	      	   while ($resultDell = $getbrandDell->fetch_assoc()) {	    

			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $resultDell['productId'] ?>"><img src="admin/uploads/<?php echo $resultDell['image'] ?>" alt="" /></a>
					 <h2><?php echo $fm->textShorten($resultDell['productName'],30) ?></h2>
					 <p><?php echo $fm->textShorten($resultDell['product_desc'], 40) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($resultDell['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultDell['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php 
			    $dell = $resultDell['brandId'];
				  }
				}
			?>
			<div style="text-align: center;"><a href="productbybrand.php?brandid=<?php echo $dell ?>" class="xemthem">Xem thêm</a></div>
		</div>
		<!-- phân trang -->
		<!-- <div class="pagination" >
			<?php
			// $get_all_productDell=$br->get_all_productDell();
			// $product_count = mysqli_num_rows($get_all_productDell);
			// $product_button = ceil($product_count/4);
			// $i=1;
			// // echo '<p>Trang: </p>';
			// for($i=1;$i<=$product_button;$i++){
            //   echo '<a class="btn btn-primary" style="margin:0 5px;" href="topbrands.php?trang='.$i.'">'.$i.'</a>';
			// }
			?>
		</div> -->

		<div class="content_bottom">
    		<div class="heading">
    		<h3>Asus</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			<?php 
	      	   $getbrandAsus = $br->getbrandAsus();
	      	   if($getbrandAsus){
	      	   while ($resultAsus = $getbrandAsus->fetch_assoc()) {	    

			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $resultAsus['productId'] ?>"><img src="admin/uploads/<?php echo $resultAsus['image'] ?>" alt="" /></a>
					 <h2><?php echo $fm->textShorten($resultAsus['productName'],30) ?></h2>
					 <p><?php echo $fm->textShorten($resultAsus['product_desc'], 40) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($resultAsus['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultAsus['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php 
			    $asus=$resultAsus['brandId'];
				  }
				}
			?>
			<div style="text-align: center;"><a href="productbybrand.php?brandid=<?php echo $asus ?>" class="xemthem">Xem thêm</a></div>
		</div>

		<div class="content_bottom">
    		<div class="heading">
    		<h3>Lenovo</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			<?php 
	      	   $getbrandLenovo = $br->getbrandLenovo();
	      	   if($getbrandLenovo){
	      	   while ($resultLenovo = $getbrandLenovo->fetch_assoc()) {	    

			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $resultLenovo['productId'] ?>"><img src="admin/uploads/<?php echo $resultLenovo['image'] ?>" alt="" /></a>
					 <h2><?php echo $fm->textShorten($resultLenovo['productName'],30) ?></h2>
					 <p><?php echo $fm->textShorten($resultLenovo['product_desc'], 40) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($resultLenovo['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultLenovo['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php 
			    $lenovo=$resultLenovo['brandId'];
				  }
				}
			?>
			<div style="text-align: center;"><a href="productbybrand.php?brandid=<?php echo $lenovo ?>" class="xemthem">Xem thêm</a></div>
		</div>

		<div class="content_bottom">
    		<div class="heading">
    		<h3>HP</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			<?php 
	      	   $getbrandHP = $br->getbrandHP();
	      	   if($getbrandHP){
	      	   while ($resultHP = $getbrandHP->fetch_assoc()) {	    

			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $resultHP['productId'] ?>"><img src="admin/uploads/<?php echo $resultHP['image'] ?>" alt="" /></a>
					 <h2><?php echo $fm->textShorten($resultHP['productName'],30) ?></h2>
					 <p><?php echo $fm->textShorten($resultHP['product_desc'], 40) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($resultHP['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultHP['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php 
			    $hp=$resultHP['brandId'];
				  }
				}
			?>
			<div style="text-align: center;"><a href="productbybrand.php?brandid=<?php echo $hp ?>" class="xemthem">Xem thêm</a></div>
		</div>

		<div class="content_bottom">
    		<div class="heading">
    		<h3>Acer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			<?php 
	      	   $getbrandAcer = $br->getbrandAcer();
	      	   if($getbrandAcer){
	      	   while ($resultAcer = $getbrandAcer->fetch_assoc()) {	    

			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $resultAcer['productId'] ?>"><img src="admin/uploads/<?php echo $resultAcer['image'] ?>" alt="" /></a>
					 <h2><?php echo $fm->textShorten($resultAcer['productName'],30) ?></h2>
					 <p><?php echo $fm->textShorten($resultAcer['product_desc'], 40) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($resultAcer['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultAcer['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php 
			    $acer=$resultAcer['brandId'];
				  }
				}
			?>
			<div style="text-align: center;"><a href="productbybrand.php?brandid=<?php echo $acer ?>" class="xemthem">Xem thêm</a></div>
		</div>
    </div>
 </div>
 <?php
      include 'inc/footer.php';
?>