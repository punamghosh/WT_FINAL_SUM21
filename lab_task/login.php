<?php
    include 'controllers/userController.php';
?>

<html>
<head>
    <title>Log-in</title>
</head>
<body>
    <h2>Log-in</h2>
    <h5><?php echo $err_db; ?></h5>
    <form action="" method="post">
    Username:<input type="text" name="username" value="<?php echo $username;?>" >
    <span><?php echo $err_username;?></span> <br><br>
    Password:<input type="text" name="pass" >
    <span><?php echo $err_pass;?></span> <br><br>
    <input type="submit" name="log_in" value="Log-in">
    </form>
</body>
</html>