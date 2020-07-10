<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/cart.php');
    include_once ($filepath.'/../helpers/format.php');
 ?>
<?php
    $fm = new format();
    $ct = new cart(); 
    if(!isset($_GET['orderid']) || $_GET['orderid'] == NULL){
        echo "<script> window.location = 'inbox.php' </script>";
        
    }else {
        $id = $_GET['orderid']; // Lấy catid trên host
    } 
?>

<style type="text/css">
.page {
    width: 95%;
    overflow: hidden;
    padding: 10px !important;
    background: white !important;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    margin: 0;
    font: 12pt "Tohoma";
}
.copyblock {
    width: 60%;
}
.header {
    overflow: hidden;
}
.logo {
    background-color: #FFFFFF;
    text-align: left;
    float: left;
}
.logo img {
    max-width: 130px;
    filter: grayscale(100%);
}
.company {
    padding-top: 24px;
    background-color: #FFFFFF;
    text-align: right;
    float: right;
    font-size: 13px;
}
.title {
    text-align: center;
    position: relative;
    color: #0e0e0e;
    font-size: 18px;
    top: 1px;
}
.TableData {
    background: #ffffff;
    width: 100%;
    border-collapse: collapse;
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 12px;
    border: thin solid #d3d3d3;
}
table {
    max-width: 100%;
}
.TableData TR {
    height: 24px;
    border: thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData .cotSTT {
    text-align: center;
    width: 10%;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border: thin solid #d3d3d3;
}
.TableData .cotTenSanPham {
    text-align: left;
    width: 40%;
}
.TableData .cotGia {
    text-align: right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight: bold;
    text-transform: uppercase;
    padding-right: 4px;
}
.footer-left {
    text-align: center;
    text-transform: uppercase;
    padding-top: 24px;
    position: relative;
    height: 80px;
    width: 50%;
    color: #000;
    float: left;
    font-size: 12px;
    bottom: 1px;
}
.footer-right {
    text-align: center;
    text-transform: uppercase;
    padding-top: 24px;
    position: relative;
    height: 80px;
    width: 50%;
    color: #000;
    font-size: 12px;
    float: right;
    bottom: 1px;
}
}
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thông tin khách hàng</h2>      
               <div class="block copyblock"> 
                    <div id="page" class="page">
                    <?php 
                     $show_orderdetails = $ct->show_orderdetails($id);
                     if($show_orderdetails){
                        // $i=0;
                        while ($result = $show_orderdetails->fetch_assoc()) {
                        // $i++;
			        ?>
		                <div class="header">
		                   <div class="logo"><img style="padding-top:40px;display:block;width: 100%;max-width: 150px;" src="img/logochinh.png"></div>
		                   <div class="company">
		                   <p>Laptop BRO - Hotline: 0359 458 586</p>
                           <p>VTC, 18 tam trinh, hai bà trưng, hà nội</p>       
                           <p>Email: laptopBRO@gmail.com</p>
                           </div>
		                </div>
		                <br>
		                <div class="title">
		                    <span>HÓA ĐƠN THANH TOÁN</span>
		                    <br>
		                    -------oOo-------
		                </div>
		                <br>
		                <br>
		                <p>Tên khách hàng: <?php echo $result['name'] ?><p>
                        <p>Email: <?php echo $result['email'] ?><p>
                        <p>Số điện thoại: <?php echo $result['phone'] ?></p>
                        <p>Địa chỉ: <?php echo $result['address'] ?></p>
  			            <br>
		                <table class="TableData">
		                <tbody>
                        <tr>
		                    <th>Mã Đơn</th>
		                    <th>Tên</th>
		                    <th>Giá</th>
		                    <th>Số lượng</th>
		                    <th>Thành tiền</th>
		                </tr>
		     
		                <tr>
		                   <td class="cotSTT"><?php echo $id; ?></td>
		                   <td class="cotTenSanPham"><?php echo $result['productName'] ?> </td>
		                   <td class="cotGia"><?php echo $fm->format_currency($result['price']).' VND' ?></td>
		                   <td class="cotSoLuong"><?php echo $result['quantity'] ?></td>
		                   <td class="cotSo">
                           <?php
						     $total= $result['price'] * $result['quantity'];
						     echo $fm->format_currency($total)." VNĐ";
					        ?>
                           </td>
                           
		                </tr>   

		                <tr>
		                   <td colspan="4" style="text-align: right;">Phí vận chuyển</td>
		                   <td class="cotSo">20.000 VNĐ</td>
		                </tr>

		                <tr>
		                   <td colspan="4" class="tong">Tổng cộng</td>
		                   <td class="cotSo">
                           <?php
								$gtotal = $total + 20000 ;
								echo $fm->format_currency($gtotal)." VNĐ";
							?>
                           </td>
		                </tr>
		                </tbody></table>

		                <div class="footer-left"><?php echo $fm->formatDate($result['date_order']) ?> <br>
		                 Khách hàng<br>
                         <?php echo $result['name'] ?></div>
		                <div class="footer-right"> <?php echo $fm->formatDate($result['date_order']) ?><br>
		                 laptop BRO </div>
                         <?php 
						    }
						}
						 ?>
		            </div>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>