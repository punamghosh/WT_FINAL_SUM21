<?php
require_once '../Models/DBconfig.php';
require_once '../Models/modelFunction.php';

if (isset($_POST['addAccounts'])) {
	$userType = $_POST['userType'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	if (empty($name) || empty($email) || empty($phone) || empty($password)) {
		$_SESSION['message'] = "<div class='brownAlert'>Field can not be empty!</div><br>";
		header('location:../create_accounts.php');
	}else if (emailExists($conn, $userType, $email)) {
		$_SESSION['message'] = "<div class='brownAlert'>Email already exists in $userType table!</div><br>";
		header('location:../create_accounts.php');
	}else{

		if ($userType=="customer") {
			$create=addCustomer($conn, $_POST);
		}else if ($userType=="seller") {
			$create=addSeller($conn, $_POST);
		}
		if ($create) {
			$_SESSION['message'] = "<div class='greenAlert'>New $userType successfully Added!</div><br>";
		}else{
			$_SESSION['message'] = "<div class='brownAlert'>Opps! Error occured with database during insertion!</div><br>";
			
		}
		header('location:../create_accounts.php');
	}
}

