<?php
	session_start();

	if (isset($_SESSION['u_id'])) {
		header("Location: events.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="src/style.css">
</head>
<body>
	<div class="container">
		<h1>Event Management System</h1>
		<div class="login-container">
							
			<div class="login-form">
				<form method="POST" action="include/login-inc.php">
					<p>
						<label><strong>E-mail</strong><br></label>
						<input type="email" name="email" autofocus="on" autocomplete="on">
					</p>
					<p>
						<label><strong>Password</strong><br></label>
						<input type="password" name="password">
					</p>
					<input type="submit" name="submit" value="Login">				
				</form>
			</div>

		</div>
	</div>

</body>
</html>