<?php
session_start();
if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) ||  ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='employee')) {
	header('location:../index.php');
	exit();
}
require_once '../Models/DBconfig.php';
require_once '../Models/modelFunction.php';


if (isset($_GET['customerId'])) {
	$userId = $_GET['customerId'];

	if (activeCustomer($conn, $userId)) {
		$_SESSION['message'] = "<div class='greenAlert'>Customer account successfully activated!</div><br>";
		header("location:../customer_list.php");
	}else{
		$_SESSION['message'] = "<div class='brownAlert'>Opps! Error occured with database during update!</div><br>";
		header("location:../customer_list.php");
	}	
}

if (isset($_GET['sellerId'])) {
	$userId = $_GET['sellerId'];

	if (activeSeller($conn, $userId)) {
		$_SESSION['message'] = "<div class='greenAlert'>Seller account successfully activated!</div><br>";
		header("location:../seller_list.php");
	}else{
		$_SESSION['message'] = "<div class='brownAlert'>Opps! Error occured with database during update!</div><br>";
		header("location:../seller_list.php");
	}	
}
