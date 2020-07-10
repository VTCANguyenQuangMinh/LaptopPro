<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
	/**
	* cần sửa lại
	*/
	class cart
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		// thêm giỏ hàng
		public function add_to_cart($id, $quantity)
		{
			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();

			$query = "SELECT * FROM tbl_product WHERE productId = '$id' ";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result['productName'];
			$price = $result['price'];
			$image = $result['image'];
			if($result['product_remain']>$quantity){
			
				$query_insert = "INSERT INTO tbl_cart(productId,productName,quantity,sId,price,image) VALUES('$id','$productName','$quantity','$sId','$price','$image' ) ";
				$insert_cart = $this->db->insert($query_insert);
				if($result){
					header('Location:cart.php');
				}else {
					header('Location:404.php');
				}
			}else{
				$msg = "<span class='erorr'> Số lượng ".$quantity." bạn đặt quá số lượng chúng tôi chỉ còn ".$result['product_remain']." cái</span> ";
				return $msg;
			}
		}
		//hiển thị giỏ hàng
		public function get_product_cart()
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}
		//cập nhật số lượng sp trong giỏ hàng
		public function update_quantity_Cart($proId,$cartId, $quantity)
		{
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);
			$proId = mysqli_real_escape_string($this->db->link, $proId);

			$query_product = "SELECT * FROM tbl_product WHERE productId = '$proId' ";
			$result_product = $this->db->select($query_product)->fetch_assoc();
			if($quantity<$result_product['product_remain']){
				$query = "UPDATE tbl_cart SET

				quantity = '$quantity'

				WHERE cartId = '$cartId'";

				$result = $this->db->update($query);
				if ($result) {
					header('Location:cart.php');
				}else {
					$msg = "<span class='erorr'> Product Quantity Update NOT Succesfully</span> ";
					return $msg;
				}
			}else{
				$msg = "<span class='erorr'> Số lượng ".$quantity." bạn đặt quá số lượng chúng tôi chỉ còn ".$result_product['product_remain']." cái</span> ";
				return $msg;
			}

		}
		// xóa giỏ hàng
		public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				header('Location:cart.php');
			}else{
				$msg = "<span style='color:red; font-size:18px;'>Sản phẩm chưa được xóa</span>";
				return $msg;
			}
		}
		// kt tiền hiển thị trên giỏ hàng ở header
		public function check_cart()
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}

		//xóa tổng tiền và số lượng trên cart chỗ header
		public function del_all_data_cart()
		{
			$sId = session_id();
			$query = "DELETE FROM tbl_cart WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}
		
	// thêm vào đơn hàng	
		public function insertOrder($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] ;
					$image = $result['image'];
					$customer_id = $customer_id;
					$query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id')";
					$insert_order = $this->db->insert($query_order);
				}
			}
		}

// hiển thị tổng tiền của đơn hàng đã đặt ở success.php
		public function getAmountPrice($customer_id)
		{
			$query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id' ";
			$get_price = $this->db->select($query);
			return $get_price;
		}

// hiển thị đơn hàng ở fonend
		public function get_cart_ordered($customer_id)
		{
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' ";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
// kiểm tra đơn hàng xuất hiện khi khách hàng đăng nhập
		public function check_order($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' ";
			$result = $this->db->select($query);
			return $result;
		}
// hiển thị đơn hàng trong admin
		public function get_inbox_cart()
		{
			$query = "SELECT * FROM tbl_order ";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}
// hàm này khi ấn vào sẽ thay đổi status từ 0 thành 1(chờ xử lý sang đang giao hàng) ở phía admin	
		public function shifted($id,$proid,$qty,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$proid = mysqli_real_escape_string($this->db->link, $proid);
			$qty = mysqli_real_escape_string($this->db->link, $qty);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query_select = "SELECT * FROM tbl_product WHERE productId='$proid'";
			$get_select = $this->db->select($query_select);

			if($get_select){
				while($result = $get_select->fetch_assoc()){
					$soluong_new = $result['product_remain'] - $qty;
					$qty_soldout = $result['product_soldout'] + $qty;

					$query_soluong = "UPDATE tbl_product SET

					product_remain = '$soluong_new',product_soldout = '$qty_soldout' WHERE productId = '$proid'";
					$result = $this->db->update($query_soluong);
				}
			}

			$query = "UPDATE tbl_order SET

			status = '1'

			WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";


			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> Update Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> Update Order NOT Succesfully</span> ";
				return $msg;
			}
		}
//admin ấn vào sẽ hiện đã giao status từ 1 thành 2
		public function dagiao($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			// $proid = mysqli_real_escape_string($this->db->link, $proid);
			// $qty = mysqli_real_escape_string($this->db->link, $qty);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			// $query_select = "SELECT * FROM tbl_product WHERE productId='$proid'";
			// $get_select = $this->db->select($query_select);

			// if($get_select){
			// 	while($result = $get_select->fetch_assoc()){
			// 		$soluong_new = $result['product_remain'] - $qty;
			// 		$qty_soldout = $result['product_soldout'] + $qty;

			// 		$query_soluong = "UPDATE tbl_product SET

			// 		product_remain = '$soluong_new',product_soldout = '$qty_soldout' WHERE productId = '$proid'";
			// 		$result = $this->db->update($query_soluong);
			// 	}
			// }

			$query = "UPDATE tbl_order SET

			status = '2'

			WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";


			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> Update Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> Update Order NOT Succesfully</span> ";
				return $msg;
			}
		}
// xóa đơn hàng
		public function del_shifted($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "DELETE FROM tbl_order 
					  WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> DELETE Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> DELETE Order NOT Succesfully</span> ";
				return $msg;
			}
		}
// phía khách hàng khi giao xong họ ấn xác nhận là đã nhận hàng status từ 2 thành 3
		public function shifted_confirm($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "UPDATE tbl_order SET

			status = '3'

			WHERE customer_id = '$id' AND date_order = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			return $result;
		}

// hiển thị đơn hàng chi tiết ở fonend, hóa đơn khách hàng trong admin từ id cảu đơn hàng
		public function show_orderdetails($id)
		{
			$query = 
			"SELECT tbl_order.*, tbl_product.*, tbl_customer.*

			 FROM tbl_order INNER JOIN tbl_product ON tbl_order.productId = tbl_product.productId
								INNER JOIN tbl_customer ON tbl_order.customer_id = tbl_customer.id
			 WHERE tbl_order.id = '$id'
			 ";

			$result = $this->db->select($query);
			return $result;
		}
    }
?>