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
	<title>Customer List</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Customer List
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
				<?php if(isset($_SESSION['message']) && !empty($_SESSION['message']))echo $_SESSION['message']."<br>"; unset($_SESSION['message']); ?>
				

				<table width="100%" border="1" cellpadding="5" id="mainTable">
					<tr>
						<th>Sl.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				<?php 

				$i=0;
				$userDatas = fetchCustomers($conn);
				if (count($userDatas)==0) {
					echo "<tr><td colspan='6' align='center'>No customer found...</td></tr>";
				}
				foreach ($userDatas as $userData) {
				?>
					<tr>
						<td><?=++$i?></td>
						<td><?=$userData['name']?></td>
						<td><?=$userData['email']?></td>
						<td><?=$userData['phone']?></td>
						<td><?=($userData['disable']==0)?"Active":"Disable"?></td>
						<td><a href="Controllers/active_account.php?customerId=<?=$userData['id']?>">Active</a> | <a href="Controllers/disable_account.php?customerId=<?=$userData['id']?>">Disable</a> | <a href="orders.php?customerId=<?=$userData['id']?>">See Orders</a></td>
					</tr>
				<?php } ?>
				</table>

			</td>
		</tr>
	</table>

</body>
</html>
