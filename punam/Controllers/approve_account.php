<?php
session_start();
if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) ||  ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='employee')) {
	header('location:../index.php');
	exit();
}
require_once '../Models/DBconfig.php';
require_once '../Models/modelFunction.php';


if (isset($_GET['sellerId'])) {
	$userId = $_GET['sellerId'];

	if (approveSeller($conn, $userId)) {
		$_SESSION['message'] = "<div class='greenAlert'>Seller successfully approved!</div><br>";
		header("location:../pending_seller.php");
	}else{
		$_SESSION['message'] = "<div class='brownAlert' >Opps! Error occured with database during update!</div><br>";
		header("location:../pending_seller.php");
	}	
}


if (isset($_GET['customerId'])) {
	$userId = $_GET['customerId'];

	if (approveCustomer($conn, $userId)) {
		$_SESSION['message'] = "<div class='greenAlert'>Customer successfully approved!</div><br>";
		header("location:../pending_customer.php");
	}else{
		$_SESSION['message'] = "<div class='brownAlert' >Opps! Error occured with database during update!</div><br>";
		header("location:../pending_customer.php");
	}	
}
