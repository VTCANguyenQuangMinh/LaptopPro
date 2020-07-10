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
		public function insert_customer($date)
		{
			$name = mysqli_real_escape_string($this->db->link, $date['name']);
			$company = mysqli_real_escape_string($this->db->link, $date['company']);
			$email = mysqli_real_escape_string($this->db->link, $date['email']);
			$address = mysqli_real_escape_string($this->db->link, $date['address']);
			$phone = mysqli_real_escape_string($this->db->link, $date['SDT']);
			$password = mysqli_real_escape_string($this->db->link, md5($date['pass']));

			if($name == "" || $company == "" || $email == "" || $address == "" || $phone == "" || $password == ""){
				$alert = "<span class='error'>Fiedls must be not empty</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if ($result_check) {
					$alert = "Email đã tồn tại!";
					return $alert;
				}else {

					if(strlen($date['pass']) < 6 || strlen($date['pass']) > 32){
						$alert = "Mật khẩu phải từ 6 đến 32 ký tự!";
						return $alert;
					}else{
						$query = "INSERT INTO tbl_customer(name,company,email,address,phone,password) VALUES('$name','$company','$email','$address','$phone','$password') ";
						$result = $this->db->insert($query);
						if($result){
							$alert = "Đăng ký tài khoản thành công";
							return $alert;
						}else {
							$alert = "Insert Customer NOT Success!";
							return $alert;
						}
					}
				}
			}
		}
		public function login_customer($date)
		{
			$email =  $date['uname'];
			$password = md5($date['pwd']);
			if($email == '' || $password == ''){
				$alert = "Không được để trống tài khoản/mật khẩu!";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE password='$password' AND  email='$email' ";
				$result_check = $this->db->select($check_login);
				if ($result_check != false) {
					$value = $result_check->fetch_assoc();
					Session::set('customer_login', true);
					Session::set('customer_id', $value['id']);
					Session::set('customer_name', $value['name']);
				}else {
					$alert = "Tài khoản hoặc mật khẩu không đúng!";
					return $alert;
				}
			}
		}
		public function show_customers($id)
		{
			$query = "SELECT * FROM tbl_customer WHERE id='$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		//hiển thị tất cả khách hàng trong admin
		public function get_customers()
		{
			$query = "SELECT * FROM tbl_customer order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		//xóa khách hàng trong admin
		public function del_customer($customerId)
		{
			$query = "DELETE FROM tbl_customer where id = '$customerId' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa thành công</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Xóa không thành công</span>";
				return $alert;
			}
		}
		public function update_customers($data, $id)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$company = mysqli_real_escape_string($this->db->link, $data['company']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			
			if($name=="" ||  $address=="" || $phone =="" ||$company == ""){
				$alert = "<span class='error'>Vui lòng điền đầy đủ thông tin!</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name',address='$address',phone='$phone',company='$company' WHERE id ='$id'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success'>Cập nhật thông tin thành công</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Whoops! Có lỗi trên cơ sở dữ liệu!</span>";
						return $alert;
				}
				
			}
		}

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
		public function getcomment()
		{
			$query = "SELECT * FROM tbl_binhluan order by binhluanId desc ";
			$getcomment = $this->db->select($query);
			return $getcomment;
		}
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
						$alert = "<span class='success'>Bình luận sẽ đc admin kiểm duyệt</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Bình luận k thành công</span>";
						return $alert;
					}
			}
		}
		public function getsupport()
		{
			$query = "SELECT * FROM tbl_support order by supportId desc ";
			$getcomment = $this->db->select($query);
			return $getcomment;
		}
        public function show_support($supportid)
		{
			$query = "SELECT * FROM tbl_support where supportId = '$supportid' ";
			$result = $this->db->select($query);
			return $result;
		}
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