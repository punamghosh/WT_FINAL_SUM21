<?php 
include'models\db_config.php';
$err_db="";
$name="";
$err_name="";
if (isset($_POST["add_category"]))
{
	if(empty($_POST["name"])) {
	    $hasError=true;
	    $err_name="name required";
	}
	else
	{
		$name=$_POST["name"];
	}
	$rs=insertCategory($_POST["name"]);
	if ($rs === true) {
		header("Location:All_categories.php");
	}
	$err_db=$rs;

}
elseif (isset($_POST["edit_category"])) {
	$rs=updateCategory($_POST["name"],$_POST["id"]);
	if ($rs === true) {
		header("Location:All_categories.php");
	}
	$err_db=$rs;
}
function insertCategory($name)
{
$query="insert into categories values(NULL,'$name')";
return execute($query);
}
function getAllcategories()
{
$query = "select * from categories";
$rs=get($query);
return $rs;
}
function getCategory($id)
{
$query="select * from categories where id=$id";
$rs=get($query);
return $rs[0];
}
function updateCategory($name,$id)
{
    $query="update categories set name='$name' where id='$id'";
    return execute($query);
}



 ?>

