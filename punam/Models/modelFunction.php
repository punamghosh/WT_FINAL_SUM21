<?php
@session_start();


function employeeExist($conn, $email, $password)
{
	$query=mysqli_query($conn, "SELECT * FROM employee WHERE email='$email' AND password='$password'");

	 if(mysqli_num_rows($query)>=1){
	 	return mysqli_fetch_assoc($query);
	 }
	 return false;
}

function emailExists($conn, $table, $email)
{
	$query=mysqli_query($conn, "SELECT * FROM $table WHERE email='$email'");

	 if(mysqli_num_rows($query)>=1){
	 	return true;
	 }
	 return false;
}

function addSeller($conn, $data)
{
	$phone = $data['phone'];
	$password = $data['password'];
	$email = $data['email'];
	$name = $data['name'];
	$q1 = "INSERT INTO seller (phone, password, email, name) VALUES ('$phone','$password','$email','$name')";
	if (execute($q1)) {
		return true;
	}
	return false;
}

function addCustomer($conn, $data)
{
	$phone = $data['phone'];
	$password = $data['password'];
	$email = $data['email'];
	$name = $data['name'];
	$q1 = "INSERT INTO customer (phone, password, email, name) VALUES ('$phone','$password','$email','$name')";
	if (execute( $q1)) {
		return true;
	}
	return false;
}



function fetchCustomers($conn, $userId=null, $pending=null)
{
	if ($userId) {
		$query = mysqli_query($conn, "SELECT * FROM customer WHERE id='$userId'");
		return mysqli_fetch_assoc($query);
	}
	$q1 = "SELECT * FROM customer where approved=1";
	if ($pending) {
		$q1 = "SELECT * FROM customer where approved=0";
	}
	
	
	return get($q1);
}



function fetchSellers($conn, $userId=null, $pending=null)
{
	if ($userId) {
		$query = mysqli_query($conn, "SELECT * FROM seller WHERE id='$userId'");
		return mysqli_fetch_assoc($query);
	}
	$q1 = "SELECT * FROM seller where approved=1";
	if ($pending) {
		$q1 = "SELECT * FROM seller where approved=0";
	}
	
	return get($q1);
}

function fetchShops($conn, $shopId=null, $pending=null)
{
	if ($shopId) {
		$query = mysqli_query($conn, "SELECT * FROM shop WHERE id='$shopId'");
		return mysqli_fetch_assoc($query);
	}
	$q1 = "SELECT * FROM shop where approved=1";
	if ($pending) {
		$q1 = "SELECT * FROM shop where approved=0";
	}
	return get($q1);
}


function fetchProducts($conn, $productId=null)
{
	if ($productId) {
		$query = mysqli_query($conn, "SELECT * FROM product WHERE id='$productId'");
		return mysqli_fetch_assoc($query);
	}
	$q1 = "SELECT * FROM product";
	
	return get($q1);
}


function fetchOrders($conn, $orderId=null, $customer_id=null)
{
	if ($orderId) {
		$query = mysqli_query($conn, "SELECT * FROM orders WHERE id='$orderId'");
		return mysqli_fetch_assoc($query);
	}
	$q1 = "SELECT * FROM orders";
	if ($customer_id) {
		$q1 = "SELECT * FROM orders where customer_id='$customer_id'";
	}
	
	return get($q1);
}


function approveCustomer($conn, $userId)
{
	$q1 = "update customer set approved=1 where id='$userId'";
	if (execute($q1)){
		return true;
	}
	return false;
}

function approveSeller($conn, $userId)
{
	$q1 = "update seller set approved=1 where id='$userId'";
	if (execute($q1)){
		return true;
	}
	return false;
}


function approveShop($conn, $shopId)
{
	$q1 = "update shop set approved=1 where id='$shopId'";
	if (execute($q1)){
		return true;
	}
	return false;
}

function disableCustomer($conn, $userId)
{
	$q1 = "update customer set disable=1 where id='$userId'";
	if (execute($q1)){
		return true;
	}
	return false;
}

function activeCustomer($conn, $userId)
{
	$q1 = "update customer set disable=0 where id='$userId'";
	if (execute($q1)){
		return true;
	}
	return false;
}

function disableSeller($conn, $userId)
{
	$q1 = "update seller set disable=1 where id='$userId'";
	if (execute($q1)){
		return true;
	}
	return false;
}

function activeSeller($conn, $userId)
{
	$q1 = "update seller set disable=0 where id='$userId'";
	if (execute($q1)){
		return true;
	}
	return false;
}

function deleteShop($conn, $shopId)
{
	$q1 = "delete from shop where id='$shopId'";
	if (execute($q1)){
		return true;
	}
	return false;
}



