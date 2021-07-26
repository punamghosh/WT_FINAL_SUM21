<?php 
include'controllers/UserController.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<h1 style="text-align: center;">Login</h1>
<h5><?php echo $err_db; ?></h5>
<form action="" method="post" style="text-align: center;">
	<h4>UserName:</h4>
	 <input type="text" name="uname" value="<?php echo $username; ?>" >
     <span><?php echo $err_username;?></span>
     <h4>Password:</h4>
	<input type="Password" name="password" value="<?php echo $password; ?>">
	<span><?php echo $err_password; ?></span>
	<br>
	<br>
	<input type="submit" name="btn_login" value="Login">
	<br> 
	<a href="Signup.php">Not registered yet!Sign Up</a>
	
</form>
</body>
</html>