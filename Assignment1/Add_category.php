<?php 
include 'controllers/CategoryController.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h5><?php echo $err_db; ?></h5>
	<form action="" method="post">
		<h4>Name</h4>
<input type="text" name="name">
<br>
<input type="submit" name="add_category" value="Add Category">
	</form>
</body>
</html>