<?php
require_once '../Models/DBconfig.php';
require_once '../Models/modelFunction.php';
//exit();
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1) {
	header('location: ../dashboard.php');
	exit();
}

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	if (empty($email) || empty($password)) {
		$_SESSION['error'] = "<font color='red'>Required field is empty</font><br>";
		header('location:../index.php');
	}else{
		$exists=employeeExist($conn, $email, $password);

		 if($exists){

		    $_SESSION['userId'] = $exists['id'];
		    $_SESSION['name'] = $exists['name'];
			
			$_SESSION['userType'] = "employee";
			$_SESSION['logged_in'] = 1;

			if (isset($_POST['save'])) {
				setcookie('email', $email, time() + (86400 * 30), "/");
				setcookie('password', $password, time() + (86400 * 30), "/");
			}else{
				unset($_COOKIE['email']);
				unset($_COOKIE['password']);
			}
			header('location:../dashboard.php');
		}else{
	   		$_SESSION['error'] = '<font color="red">Employee with this email and password doesn\'t exists!</font><br>';
	   		header('location:../index.php');
	   	}
			
	}
}