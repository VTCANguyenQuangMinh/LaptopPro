<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
 ?>
<?php
    $cs = new customer(); 
    if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
        echo "<script> window.location = 'comment.php' </script>";
        
    }else {
        $poductid = $_GET['proid']; // Lấy catid trên host
    } 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thông tin sản phẩm</h2>      
               <div class="block copyblock"> 
                
                 <?php 
                    $product_comment = $cs->show_product_comment($poductid);
                    if($product_comment){
                        while ($result = $product_comment->fetch_assoc()) {
                            
                        
                  ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Tên sản phẩm</td>
                            <td>:</td>
                            <td><?php echo $result['productName']; ?></td>
                        </tr>
                        <tr>
                            <td>Ảnh sản phẩm </td>
                            <td>:</td>
                            <td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
                        </tr>
                        <tr>
                            <td>Giá sản phẩm</td>
                            <td>:</td>
                            <td><?php echo $result['price']." VND" ?></td>
                        </tr>
                        <tr>
                            <td>Thương hiệu</td>
                            <td>:</td>
                            <td><?php echo $result['brandName']; ?></td>
                        </tr>
                        <tr>
                            <td>Loại CPU</td>
                            <td>:</td>
                            <td><?php echo $result['catName']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td>Mô tả sản phẩm</td>
                            <td>:</td>
                            <td><?//php echo $result['product_desc']; ?></td>
                        </tr> -->
                    </table>
                    </form>
                    <?php 
                        }
                    }

                     ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>