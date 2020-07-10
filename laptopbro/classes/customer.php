<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
	/**
	* 
	*/
	class customer
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		// thêm khách hàng
		public function insert_customer($date)
		{
			$name = mysqli_real_escape_string($this->db->link, $date['name']);
			$city = mysqli_real_escape_string($this->db->link, $date['city']);
			$zipcode = mysqli_real_escape_string($this->db->link, $date['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $date['email']);
			$address = mysqli_real_escape_string($this->db->link, $date['address']);
			$country = mysqli_real_escape_string($this->db->link, $date['country']);
			$phone = mysqli_real_escape_string($this->db->link, $date['phone']);
			$password = mysqli_real_escape_string($this->db->link, md5($date['password']));

			if($name == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $country == "" || $phone == "" || $password == ""){
				$alert = "<span class='error'>Fiedls must be not empty</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if ($result_check) {
					$alert = "<span class='error'>The Email Already Exists??? Please Enter Another Email </span>";
					return $alert;
				}else {
					$query = "INSERT INTO tbl_customer(name,city,zipcode,email,address,country,phone,password) VALUES('$name','$city','$zipcode','$email','$address','$country','$phone','$password') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Insert Customer Successfully</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Insert Customer NOT Success</span>";
						return $alert;
					}
				}
			}
		}
		// đăng nhập
		public function login_customer($date)
		{
			$email =  $date['email'];
			$password = md5($date['password']);
			if($email == '' || $password == ''){
				$alert = "<span class='error'>Email And Password must be not empty</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' ";
				$result_check = $this->db->select($check_login);
				if ($result_check != false) {
					$value = $result_check->fetch_assoc();
					Session::set('customer_login', true);
					Session::set('customer_id', $value['id']);
					Session::set('customer_name', $value['name']);
					header('Location:index.php');
				}else {
					$alert = "<span class='error'>Email or Password doesn't match</span>";
					return $alert;
				}
			}
		}
		// hiển thị khách hàng bởi id khách hàng
		public function show_customers($id)
		{
			$query = "SELECT * FROM tbl_customer WHERE id='$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		// cập nhật
		public function update_customers($data, $id)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			
			if($name=="" || $zipcode=="" || $email=="" || $address=="" || $phone ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' WHERE id ='$id'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success'>Khách hàng Updated thành công</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Khách hàng Updated Not thành công</span>";
						return $alert;
				}
				
			}
		}
         // thêm bình luận
		public function insert_binhluan(){
			$productId=$_POST['product_id_binhluan'];
			$tenbinhluan=$_POST['tennguoibinhluan'];
			$binhluan=$_POST['binhluan'];
			if($tenbinhluan == '' || $binhluan== ''){
				$alert="<span class='error'>fields must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_binhluan(tenbinhluan,binhluan,productId) VALUES('$tenbinhluan','$binhluan','$productId') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Bình luận sẽ đc admin kiểm duyệt</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Bình luận k thành công</span>";
						return $alert;
					}
			}
		}
		// hiển thị comment trong admin
		public function getcomment()
		{
			$query = "SELECT * FROM tbl_binhluan ";
			$getcomment = $this->db->select($query);
			return $getcomment;
		}
		// hiển thị sản phẩm đc comment
        public function show_product_comment($poductid)
		{
			$query = 
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
								INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			 WHERE tbl_product.productId = '$poductid'
			 ";

			$result = $this->db->select($query);
			return $result;
		}
		// xóa comment
		public function del_comment($binhluanid)
		{
			$query = "DELETE FROM tbl_binhluan where binhluanId = '$binhluanid' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Comment Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Comment Deleted Not Success</span>";
				return $alert;
			}
		}
        // thêm liên hệ
	    public function insert_support(){
			$supportName=$_POST['supportname'];
			$supportEmail=$_POST['supportemail'];
			$supportPhone=$_POST['supportphone'];
			$content=$_POST['yeucau'];
			if($supportName == '' || $supportEmail== ''|| $supportPhone== ''|| $content== ''){
				$alert="<span class='error'>fields must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_support(supportName,supportEmail,supportPhone,content) VALUES('$supportName','$supportEmail','$supportPhone','$content') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Yêu cầu đã được gửi</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Yêu cầu không được gửi</span>";
						return $alert;
					}
			}
		}
		// hiển thị liên hệ
		public function getsupport()
		{
			$query = "SELECT * FROM tbl_support ";
			$getcomment = $this->db->select($query);
			return $getcomment;
		}
		//xem inbox
        public function show_support($supportid)
		{
			$query = "SELECT * FROM tbl_support where supportId = '$supportid' ";
			$result = $this->db->select($query);
			return $result;
		}
		// xóa
		public function del_support($supportid)
		{
			$query = "DELETE FROM tbl_support where supportId = '$supportid' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Support Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Support Deleted Not Success</span>";
				return $alert;
			}
		}
	}
 ?>