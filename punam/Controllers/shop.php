<?php
session_start();
if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) ||  ($_SESSION['logged_in']!=1) || ($_SESSION['userType']!='employee')) {
	header('location:../index.php');
	exit();
}
require_once '../Models/DBconfig.php';
require_once '../Models/modelFunction.php';


if (isset($_GET['approveId'])) {
	$shopId = $_GET['approveId'];

	if (approveShop($conn, $shopId)) {
		$_SESSION['message'] = "<div class='greenAlert'>Shop successfully approved!</div><br>";
		header("location:../shop_request.php");
	}else{
		$_SESSION['message'] = "<div class='brownAlert'>Opps! Error occured with database during update!</div><br>";
		header("location:../shop_request.php");
	}	
}

if (isset($_GET['deleteId'])) {
	$shopId = $_GET['deleteId'];

	if (deleteShop($conn, $shopId)) {
		$_SESSION['message'] = "<div class='greenAlert'>Shop successfully deleted!</div><br>";
		//header("location:../shop_request.php");
	}else{
		$_SESSION['message'] = "<div class='brownAlert'>Opps! Error occured with database during update!</div><br>";
		//header("location:../shop_request.php");
	}	

	if (isset($_GET['shopList'])) {
		header("location:../shop_list.php");
	}else{
		header("location:../shop_request.php");
	}
}
