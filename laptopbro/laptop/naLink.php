<?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
          
        
	  }else {
        header('Location:payment.php');
      }

      
?>