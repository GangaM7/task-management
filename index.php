<?php
require 'authentication.php'; // admin authentication check 

// auth check
if(isset($_SESSION['admin_id'])){
  $user_id = $_SESSION['admin_id'];
  $user_name = $_SESSION['admin_name'];
  $security_key = $_SESSION['security_key'];
  if ($user_id != NULL && $security_key != NULL) {
    header('Location: task-info.php');
  }
}

if(isset($_POST['login_btn'])){
 $info = $obj_admin->admin_login_check($_POST);
}

$page_name="Login";
include("include/login_header.php");

?>

<div class="log">
		<div class="well1" >
		
<div class="row">
<div class="col-md-6 col-md-12"  style="background-image: url('assets/img/login.png'); background-size: cover; background-position: center; padding: 200px;"> 
     
      </div>
	<div class="col-md-6 col-md-12 logf" >
			<form class="form-horizontal form-custom-login" action="" method="POST">
			<center><h2 >Login</h2></center>
			  
			  <!-- <div class="login-gap"></div> -->
			  <?php if(isset($info)){ ?>
			  <h5 class="alert alert-danger"><?php echo $info; ?></h5>
			  <?php } ?>
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="email" name="email" required/>
			  </div>
			  <div class="form-group" ng-class="{'has-error': loginForm.password.$invalid && loginForm.password.$dirty, 'has-success': loginForm.password.$valid}">
			    <input type="password" class="form-control" placeholder="Password" name="admin_password" required/>
			  </div>
			  <div class="text-center">
              <button type="submit" name="login_btn" class="btn btn-info">Login</button>
            </div>
			</form>
		</div>
	</div>
</div>


<?php

include("include/footer.php");

?>
