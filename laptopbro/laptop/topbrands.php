<?php
	   include 'inc/header.php';
 ?>

<div class="background-boder">
	<div class="boder">
		<div class="left-ctn">
			<div class="Top-left">
				<h5>THƯƠNG HIỆU NỔI TIẾNG</h5>
				<div class="Top-left-ctn">
					<?php 

						$brandShow = $br->show_brand();
						if($brandShow)
						{
							while ($result = $brandShow->fetch_assoc()) {
					?>
					
					<a href="pagination.php?brand=<?php echo $result['brandId'] ?>"><div><?php echo $result['brandName'] ?></div></a>
					<?php
						}}
					?>
				</div>
				<hr>
				<h5>LOẠI SẢN PHẨM</h5>
				<div class="Top-left-ctn">
					<?php 

						$catShow = $cat->show_category();
						if($catShow)
						{
							while ($result = $catShow->fetch_assoc()) {
					?>
					
					<a href="pagination.php?cat=<?php echo $result['catId'] ?>"><div><?php echo $result['catName'] ?></div></a>
					<?php
						}}
					?>
				</div>
				<hr>
			</div>
		</div>
		<div class="right-ctn">
			<?php
				include 'inc/slider.php';
			?>

			<div class="border">
				<?php 
					
					$brandShow = $br->show_brand();
					
					if($brandShow)
					{
						while ($result = $brandShow->fetch_assoc()) {
						$brandID = $result['brandId'];
						
				?>
					<div>
						<div class="topbrand"><?php echo $result['brandName'] ?></div>
						<div class="section group2">
							<?php 
							$product_brand = $product->getproductByBrand($brandID);
							if($product_brand){
								
								while ($result_brand = $product_brand->fetch_assoc()) {
								$PdBrand = substr( $result_brand['productName'],  0, 40) . "..."; 
								
								?>
								
								<div class="grid_1_of_4 images_1_of_4">
									<a href="details.php?proid=<?php echo $result_brand['productId'] ?>">
									<div>
										<img  src="admin/uploads/<?php echo $result_brand['image'] ?>" alt="" />
									</div>
									<div class="hdiv1">
									<h2><?php echo $PdBrand?></h2></div>
									<div class="hdiv">
									<p><?php echo $fm->textShorten($result_brand['product_desc'], 50) ?></p></div>
									<div class="hdiv">
									<p style="text-align:center;"><span class="price"><?php echo $fm->format_currency($result_brand['price'])." VND" ?></span></p></div>
									</a>
								</div>
								
							<?php 
							
								}
							}
							?>
						</div>
						<div class="botbrand">
							<div><a href="<?php echo "pagination.php?brand=".$brandID;?>"><button> XEM THÊM </button></a></div>
						</div>
					</div>
				<?php
					}}
				?>
			</div>
			
		</div>
	</div>
</div>
 <?php
      include 'inc/footer.php';
?>