<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">     
                 
         <form action="" method="POST">
            <table class="form">	
                <tr>
                    <td>
                        <label>Tên tài khoản</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Nhập tên tài khoản..."  name="tentaikhoan" class="medium" />
                    </td>
                </tr>				
                <tr>
                    <td>
                        <label>Mật khẩu cũ</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="mkcu" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Mật khẩu mới</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="mkmoi" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>