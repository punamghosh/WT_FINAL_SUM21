<?php 
include 'controllers/UserController.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign UP</title>
</head>
<body>
<h1 style="text-align: center;">Sign Up</h1>
<h5><?php echo $err_db; ?></h5>

<form style="text-align: center;" action="" method="post">
	
	 <h4>Name:</h4>
	
	 <input type="text" name="name" value="<?php echo $name; ?>">
	
	  <span><?php echo $err_name; ?></span>
	    <h4>UserName:</h4>
	 
     <input type="text" name="uname" value="<?php echo $username; ?>" >
     <span><?php echo $err_username; ?></span>
	
      <h4>Email Address:</h4>

	<input type="text" name="email" value="<?php echo $email; ?>">
	<span><?php echo $err_email; ?></span>
	<h4>Password:</h4>
	<input type="Password" name="password" value="<?php echo $password; ?>">
	<span><?php echo $err_password; ?></span>
	<br><br>
	<input type="submit" name="sign_up" value="Sign Up">
</form>
</body>
</html>