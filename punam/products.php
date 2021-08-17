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
	<title>Products</title>
</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Products
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


				<table width="100%" border="1" cellpadding="5" id="mainTable">
					<tr>
						<th>Sl.</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Shop Name</th>
					</tr>
				<?php 

				$i=0;
				$productDatas = fetchProducts($conn);
				if (count($productDatas)==0) {
					echo "<tr><td colspan='4' align='center'>No product found...</td></tr>";
				}
				foreach ($productDatas as $productData) {
				?>
					<tr>
						<td><?=++$i?></td>
						<td><?=$productData['name']?></td>
						<td><?=$productData['price']?></td>
						<td><?=fetchShops($conn, $productData['shop_id'])['name']?></td>
					</tr>
				<?php } ?>
				</table>

			</td>
		</tr>
	</table>

</body>
</html>


