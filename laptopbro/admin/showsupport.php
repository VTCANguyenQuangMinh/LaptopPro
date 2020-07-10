<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
 ?>
<?php
    $cs = new customer(); 
    if(!isset($_GET['supportid']) || $_GET['supportid'] == NULL){
        echo "<script> window.location = 'support.php' </script>";
        
    }else {
        $supportid = $_GET['supportid']; // Lấy catid trên host
    } 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Nội dung cần hỗ trợ</h2>      
               <div class="block copyblock"> 
                
                 <?php 
                    $show_support = $cs->show_support($supportid);
                    if($show_support){
                        while ($result = $show_support->fetch_assoc()) {
                            
                        
                  ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td><?php echo $result['content']; ?></td>
                        </tr>
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