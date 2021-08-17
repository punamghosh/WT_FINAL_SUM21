<?php
session_start();
require_once 'Models/DBconfig.php';
require_once 'Models/modelFunction.php';

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userType']) ||  $_SESSION['logged_in']!=1) {
	header('location:../index.php');
	exit();
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Orders
				</h1>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php include_once 'includes/topbar.php'; ?>
			</td>
		</tr>
		<tr height="360px">
			<td width="25%">
				<?php include_once 'includes/sidebar.php'; ?>
			</td>
			<td align="center" bgcolor="dimgray">

				<table width="100%" border="1">
				<?php if (isset($_GET['customerId'])) { 
					$customerData = fetchCustomers($conn, $_GET['customerId']);
				?>
					<tr>
						<td colspan="7">
							<b>Name: <?=$customerData['name']?></b><br>
							<b>Phone: <?=$customerData['phone']?></b>
						</td>
					</tr>
				<?php } ?>
					<tr>
						<th>Sl.</th>
						<th>Created at</th>
						<th>Customer Name</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>
				<?php 

				$i=0;
				$orderDatas = fetchOrders($conn);
				if (isset($_GET['customerId'])) {
					$orderDatas = fetchOrders($conn,null, $_GET['customerId']);
				}
				if (count($orderDatas)==0) {
					echo "<tr><td colspan='7' align='center'>No order found...</td></tr>";
				}
				foreach ($orderDatas as $orderData) {
				?>
					<tr>
						<td><?=++$i?></td>
						<td><?=$orderData['date_time']?></td>
						<td><?=fetchCustomers($conn, $orderData['customer_id'])['name']?></td>
						<td><?=fetchProducts($conn, $orderData['product_id'])['name']?></td>
						<td><?=$orderData['product_price']?></td>
						<td><?=$orderData['quantity']?></td>
						<td><?=($orderData['quantity']*$orderData['product_price'])?></td>
					</tr>
				<?php } ?>
				</table>

			</td>
		</tr>
	</table>

</body>
</html>
