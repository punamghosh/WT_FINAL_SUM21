<?php 
	include 'controllers/StudentController.php';
	$students = getAllstudents();
	
?>


<html>
<head>
    <title>All Student</title>
</head>
<body>
<h2>Admin</h2>

<a href="dashboard.php">Dashboard</a> <br><br>
    <a href="Allstudent.php">All Students</a> <br><br>
    <a href="Addstudent.php">Add Students</a> <br><br>
    <a href="Alldepertment.php">All Departments</a> <br><br>
    <a href="Adddepertment.php">Add Departments</a> <br>
	<h3>All Student</h3><br>
    <table  border=	"1px solid">
		<thead>
			<th>Id</th>
			<th> Name</th>
			<th>Date of Birth</th>
			<th>Credit </th>
			<th>Cgpa</th>
			<th>Department</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
		<tbody>
			<?php
				$i=1;
				foreach($students as $s){
					$id = $s["id"];
					echo "<tr>";
						echo "<td>$i</td>";
						echo "<td>".$s["name"]."</td>";
						echo "<td>".$s["dateof_birth"]."</td>";
						echo "<td>".$s["credit"]."</td>";
						echo "<td>".$s["cgpa"]."</td>";
						echo "<td>".$s["dept_name"]."</td>";
						echo '<td><a href="editStudent.php?id='.$id.'">Edit</a></td>';
						echo '<td><a>Delete</td>';
					echo "</tr>";
					$i++;
				}
			?>
			
		</tbody>
    </table>
</body>
</html>