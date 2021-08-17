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
	<title>Pending Seller List</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Pending Seller List
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
				
				<table width="100%" border="1">
					<tr>
						<th>Sl.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
				<?php 

				$i=0;
				$userDatas = fetchSellers($conn, null, true);
				if (count($userDatas)==0) {
					echo "<tr><td colspan='5' align='center'>No pending seller found...</td></tr>";
				}
				foreach ($userDatas as $userData) {
				?>
					<tr>
						<td><?=++$i?></td>
						<td><?=$userData['name']?></td>
						<td><?=$userData['email']?></td>
						<td><?=$userData['phone']?></td>
						<td><a href="Controllers/approve_account.php?sellerId=<?=$userData['id']?>">Approve</a> </td>
					</tr>
				<?php } ?>
				</table>

			</td>
		</tr>
	</table>

</body>
</html>
