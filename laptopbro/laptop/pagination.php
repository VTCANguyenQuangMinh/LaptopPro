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
                    try{

                        if(isset($_GET["brand"]))
                        {
                            
                            $brandId = htmlspecialchars($_GET["brand"]);

                            if($check == 0)
                            {
                                $brandName = $br->get_brandById($brandId);
                                if($brandName)
                                {
                                    while ($result = $brandName->fetch_assoc()) {
                                    echo "<div class='topbrand'>". $result['brandName']."</div>";
                                    
                                    }
                                }

                                $pagerows = 4;
                            
                                $record = $product->getNumberOfproductByBrand($brandId);
                            }
                            
                            

                            if($record>$pagerows)
                            {
                                $pages = ceil($record/$pagerows);
                                
                            }else{
                                $pages = 1;
                            }

                            if(isset($_GET["s"]) && is_numeric($_GET["s"]))
                            {
                                $start = htmlspecialchars($_GET["s"]);
                            }else{
                                $start = 0;
                            }

                            $productPagin = $product->getAllproductByBrand($brandId,$start, $pagerows);
                            
                            if($productPagin)
                            {
                                echo "<div class='section group2'>";
                                while($result = $productPagin->fetch_assoc())
                                {
                                    
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
                                echo "</div>";
                            }

                            if($pages>=1)
                            {
                                
                                $current_page = round(($start/$pagerows)+1);
                                $echoString = "<div class='text-right'>";
                                if($current_page > 2)
                                {
                                    $echoString .= "<a href='pagination.php?s=" . ($start-2*$pagerows)."&brand=".$brandId."'><button ><</button></a>";
                                }
                                if($current_page > 1)
                                {
                                    $echoString .= "<a href='pagination.php?s=" . ($start-$pagerows)."&brand=".$brandId."'><button class='currenBtn1'>". ($current_page-1) ."</button></a>";
                                }
                                
                                $echoString .= "<button class='currenBtn'>" . $current_page . "</button>";
                                if($current_page <$pages)
                                {
                                    $echoString .= "<a href='pagination.php?s=" . ($start+$pagerows)."&brand=".$brandId."'><button class='currenBtn1'>". ($current_page+1) ."</button></a>";
                                }
                                if($current_page < $pages-1)
                                {
                                    $echoString .= "<a href='pagination.php?s=" . ($start+2*$pagerows) . "&brand=".$brandId."'><button >></button></a>";
                                }
                                $echoString .= "</div>";
                                echo $echoString;
                            }

                           
                        }else if(isset($_GET["cat"])){
                            $catId = htmlspecialchars($_GET["cat"]);


                            $catName = $cat->getcatbyId($catId);
                            if($catName)
                            {
                                while ($result = $catName->fetch_assoc()) {
                                echo "<div class='topbrand'>". $result['catName']."</div>";
                                
                                }
                            }

                            $pagerows = 4;
                        
                            $record = $product->getNumberOfproductByCategory($catId);
                        

                            if($record>$pagerows)
                            {
                                $pages = ceil($record/$pagerows);
                                
                            }else{
                                $pages = 1;
                            }

                            if(isset($_GET["s"]) && is_numeric($_GET["s"]))
                            {
                                $start = htmlspecialchars($_GET["s"]);
                            }else{
                                $start = 0;
                            }

                            $productPagin = $product->getAllproductByCategory($catId,$start, $pagerows);
                            
                            if($productPagin)
                            {
                                echo "<div class='section group2'>";
                                while($result = $productPagin->fetch_assoc())
                                {
                                    
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
                                echo "</div>";
                            }

                            if($pages>=1)
                            {
                                
                                $current_page = round(($start/$pagerows)+1);
                                $echoString = "<div class='text-right'>";
                                if($current_page > 2)
                                {
                                    $echoString .= "<a href='pagination.php?s=" . ($start-2*$pagerows)."&cat=".$brandId."'><button ><</button></a>";
                                }
                                if($current_page > 1)
                                {
                                    $echoString .= "<a href='pagination.php?s=" . ($start-$pagerows)."&cat=".$brandId."'><button class='currenBtn1'>". ($current_page-1) ."</button></a>";
                                }
                                
                                $echoString .= "<button class='currenBtn'>" . $current_page . "</button>";
                                if($current_page <$pages)
                                {
                                    $echoString .= "<a href='pagination.php?s=" . ($start+$pagerows)."&cat=".$brandId."'><button class='currenBtn1'>". ($current_page+1) ."</button></a>";
                                }
                                if($current_page < $pages-1)
                                {
                                    $echoString .= "<a href='pagination.php?s=" . ($start+2*$pagerows) . "&cat=".$brandId."'><button >></button></a>";
                                }
                                $echoString .= "</div>";
                                echo $echoString;
                            }

                        }

                        
                    }catch(Exception $e)
                    {
                        echo "An exception occured. Message: " . $e->message();
                    }
                ?>
            </div>
			
		</div>
	</div>
</div>
 <?php
      include 'inc/footer.php';
?>