<?php
session_start();
require_once 'Models/DBconfig.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Accounts</title>

</head>
<body bgcolor="aqua">
	<table border="1" width="100%" cellpadding="10">
		<tr>
			<td align="center" colspan="2" bgcolor="dimgray">
				<h1>
					Create Accounts
				</h1>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php include_once 'includes/topbar.php'; ?>
			</td>
		</tr>
		<tr height="360px">
			<td align="center" bgcolor="dimgray" colspan="2">
				<div id="message"></div>
				<?php if(isset($_SESSION['message']) && !empty($_SESSION['message']))echo $_SESSION['message']."<br>"; unset($_SESSION['message']); ?>
				<table width="100%" cellpadding="6">

				<form action="Controllers/create_accounts.php" method="post" onsubmit="return accounts()">
					<tr>
						<td>
							Account Type
						</td>
						<td>
							<select name="userType">
								<option value="customer">Customer</option>
								<option value="seller">Seller</option>
							</select>
						</td>
						<td colspan="2">
							
						</td>
					</tr>
					<tr>
						
						<td>
							Name
						</td>
						<td>
							<input type="text" name="name" size="50">
						</td>
						<td>
							Phone
						</td>
						<td>
							<input type="text" name="phone" size="50">
						</td>
						
					</tr>
					<tr>
						<td>
							E-mail
						</td>
						<td>
							<input type="text" name="email" size="50">
						</td>
						<td>
							Password
						</td>
						<td>
							<input type="text" name="password" size="50">
						</td>
					</tr>
					<tr>
						<td colspan="4" align="right"><hr>
							<input type="submit" name="addAccounts" value="Add Account">
						</td>
					</tr>
				</form>
				</table>
				<br>
				
			</td> 
		</tr>
	</table>
<script type="text/javascript">
	function accounts() {
		var phone = document.getElementsByName('phone')[0].value.trim();
		var password = document.getElementsByName('password')[0].value.trim();
		var name = document.getElementsByName('name')[0].value.trim();
		var email = document.getElementsByName('email')[0].value.trim();

		if (phone.length==0 || password.length==0 || name.length==0 || email.length==0) {
			document.getElementById('message').innerHTML = "<div class='brownAlert'>*Required field is empty!</div>";
			return false;
		}else if (!emailBreakdown(email)) {
			document.getElementById('message').innerHTML = "<div class='brownAlert'>*Invalid email format!</div>";
			return false;
		}else{
			return true;
		}
	}
</script>
<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>