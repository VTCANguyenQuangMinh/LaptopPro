<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/customer.php');
	include_once ($filepath.'/../helpers/format.php');
 ?>
 <?php
    $cs = new customer();
    if(isset($_GET['del_support'])){
        $supportid = $_GET['del_support'];
        
    	$del_support = $cs->del_support($supportid);
    }
 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Hỗ trợ</h2>
                <div class="block">
                <?php 
                if (isset($del_support)) {
                	echo $del_support;
                }
                 ?>         
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Ngày</th>
							<th>Tên</th>
							<th>Email</th>
							<th>Số điện thoại</th>
							<th>Inbox</th>
							<th>Xử lý</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$cs = new customer();
						$fm = new Format();
						$support = $cs -> getsupport();
						if ($support) {
							$i=0;// số thứ tự
							while ($result = $support->fetch_assoc()) {
								$i++;
							
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['support_date'] ?> </td>
							<td><?php echo $result['supportName'] ?> </td>
							<td><?php echo $result['supportEmail'] ?></td>
							<td><?php echo $result['supportPhone'] ?></td>
							<td><a href="showsupport.php?supportid=<?php echo $result['supportId'] ?>">Xem inbox</a></td>
						    <td><a onclick = "return confirm('Are you want to delete???')" href="?del_support=<?php echo $result['supportId'] ?>">Delete</a></td>
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
