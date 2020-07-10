<!-- <style type="text/css">
img{
	max-width:80%;
}
.flexslider .slides img {
	width: 100%; 
	display: block;
	min-height:310px;
	margin-left:auto;
	margin-right:auto;
}
</style> -->
<div class="header_bottom">

	
		   <!-- FlexSlider -->
             
			<section class="slider">
			<div class="flexslider">
					<ul class="slides">
						<?php 
						$get_slider = $product->show_slider();
						if ($get_slider) {
							while ($result_slider = $get_slider->fetch_assoc()) {
								# code...
							
						 ?>
						<li><img src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt=""/></li>
						<?php 
						}
						}
						 ?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	
	  <div class="clear"></div>
  </div>