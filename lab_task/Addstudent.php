<?php
	include 'controllers/StudentController.php';
?>

<html>
<head>
    <title>Add Student</title>
</head>
<body>
<h2>Admin</h2>
    <a href="dashboard.php">Dashboard</a> <br><br>
    <a href="Allstudent.php">All Students</a> <br><br>
    <a href="Addstudent.php">Add Students</a> <br><br>
    <a href="Alldepertment.php">All Departments</a> <br><br>
    <a href="Adddepertment.php">Add Departments</a> <br>
    
    <h5><?php echo $err_db; ?></h5>
    <form action="" method="post">
        <h3>Add Student</h3>
        Name:<input type="text" name="name" value="<?php echo $name;?>">
        <span><?php echo $err_name;?></span> <br><br>
        Date of Birth: <input type="text" name="dateof_birth" value="<?php echo $dateof_birth;?>">
        <span><?php echo $err_dateof_birth;?></span> <br><br>
        Credit: <input type="text" name="credit" value="<?php echo $credit;?>">
        <span><?php echo $err_credit;?></span> <br><br>
        CGPA:  <input type="text" name="cgpa" value="<?php echo $cgpa;?>">
        <span><?php echo $err_cgpa;?></span> <br><br>
        Dept. Name: <input type="text" name="dept_name" value="<?php echo $dept_name;?>">
        <span><?php echo $err_dept_name;?></span> <br><br>
        <input type="submit" name="add_student"value="Add Student">
    </form>
</body>
</html>