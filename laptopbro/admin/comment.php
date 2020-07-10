<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/customer.php');
	include_once ($filepath.'/../helpers/format.php');
 ?>
 <?php
    $cs = new customer();
    if(isset($_GET['del_comment'])){
        $binhluanid = $_GET['del_comment'];
        
    	$del_comment = $cs->del_comment($binhluanid);
    }
 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Bình luận</h2>
                <div class="block">
                <?php 
                if (isset($del_comment)) {
                	echo $del_comment;
                }
                 ?>         
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Ngày</th>
							<th>Người bình luận</th>
							<th>Bình luận</th>
							<th>ID sản phẩm</th>
							<th>Sản phẩm</th>
							<th>Xử lý</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$cs = new customer();
						$fm = new Format();
						$comment = $cs -> getcomment();
						if ($comment) {
							$i=0;// số thứ tự
							while ($result = $comment->fetch_assoc()) {
								$i++;
							
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['binhluan_date'] ?> </td>
							<td><?php echo $result['tenbinhluan'] ?> </td>
							<td><?php echo $result['binhluan'] ?></td>
							<td><?php echo $result['productId'] ?></td>
							<td><a href="product_bl.php?proid=<?php echo $result['productId'] ?>">Xem sản phẩm</a></td>
						    <td><a onclick = "return confirm('Are you want to delete???')" href="?del_comment=<?php echo $result['binhluanId'] ?>">Delete</a></td>
						</tr>
						<?php 
						}
						}
						 ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
