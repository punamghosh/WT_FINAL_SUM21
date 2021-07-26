<?php 
include'models/db_config.php';

$name="";
$err_name="";
$username="";
$err_username="";
$email="";
$err_email="";
$password="";
$err_password="";
$err_db="";
$hasError=false;
if (isset($_POST["sign_up"])) {
	
	if (empty($_POST["name"])) {
	    $hasError=true;
	    $err_name="name required";
	}
	else
	{
		$name=$_POST["name"];
	}
	if (empty($_POST["uname"])) {
	    $hasError=true;
	    $err_username=" user name required";
	}
	else
	{
		$username=$_POST["uname"];
	}
	if (empty($_POST["email"])) {
	    $hasError=true;
	    $err_email=" user email required";
	}
	else
	{
		$email=$_POST["email"];
	}
	if (empty($_POST["password"])) {
	    $hasError=true;
	    $err_password=" password required";
	}
	else
	{
		$password=$_POST["password"];
	}
	if (!$hasError) {
		$rs=insertUser($name,$username,$_POST["email"],$_POST["password"]);
		if ($rs === true) {
			header("Location:login.php");
		}
		$err_db = $rs;
	}

 }
elseif (isset($_POST["btn_login"])){
	
	if (empty($_POST["uname"])) {
	    $hasError=true;
	    $err_username=" user name required";
	}
	else
	{
		$username=$_POST["uname"];
	}
	if (empty($_POST["password"])) {
	    $hasError=true;
	    $err_password=" password required";
	}
	else
	{
		$password=$_POST["password"];
	}
	if (!$hasError) {
		if (authenticateUser($username,$password)) {
			header("Location:dashboard.php");
		}
		$err_db="Username and password invalid";
	}

}
function insertUser($name,$username,$email,$password)
{
	$query="insert into users values (NULL,'$name','$username','$email','$password')";
	 return execute($query);
}
function authenticateUser($username,$password)
{
	$query="select * from users where username= '$username' and password= '$password'";
	$rs=get($query);
	if (count($rs)>0) {
		return true;
	}
	return false;
}


?>