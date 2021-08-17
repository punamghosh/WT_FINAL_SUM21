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
	<title>Shop List</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Shop List
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
						<th>Address</th>
						<th>Seller Name</th>
						<th>Action</th>
					</tr>
				<?php 

				$i=0;
				$shopDatas = fetchShops($conn);
				if (count($shopDatas)==0) {
					echo "<tr><td colspan='6' align='center'>No shop found...</td></tr>";
				}
				foreach ($shopDatas as $shopData) {
				?>
					<tr>
						<td><?=++$i?></td>
						<td><?=$shopData['name']?></td>
						<td><?=$shopData['address']?></td>
						<td><?=fetchSellers($conn, $shopData['seller_id'])['name']?></td>
						<td><a href="Controllers/shop.php?deleteId=<?=$shopData['id']?>&shopList=true">Delete</a></td>
					</tr>
				<?php } ?>
				</table>

			</td>
		</tr>
	</table>

</body>
</html>

