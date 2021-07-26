<?php 
include 'controllers/CategoryController.php';
$id=$_GET["id"];
$c=getCategory($id);
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
		<input type="hidden" name="id" value="<?php echo $c["id"] ;?>">
<input type="text" name="name" value="<?php echo $c["name"]; ?>">
<br>
<input type="submit" name="edit_category" value="Edit Category">
	</form>
</body>
</html>