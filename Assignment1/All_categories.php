<?php 
include 'controllers/CategoryController.php';
$categories=getAllcategories();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<table>
		<thead>
			<th>SL#</th>
			<th>Name</th>
			<th>Product Count</th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
			<?php 
			$i=1;
			foreach ($categories as $c) {
				$id=$c["id"];
				echo "<tr>";
					echo "<td>$i</td>";
					echo "<td>.$c[name].</td>";
					echo '<td><a href="Edit_category.php ?id='.$id.'">Edit</a></td>';
			        echo '<td><a href="Delete_category.php">Delete</a></td>';
				echo "</tr>";
				$i++;


			}
			 ?>
			
		</tbody>
	</table>

</body>
</html>