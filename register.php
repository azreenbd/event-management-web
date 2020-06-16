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
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="src/style.css">
</head>
<body>
	<div class="container">
		<h1>Event Management System</h1>
		<div class="login-container">
							
			<div class="login-form">
				<form method="POST" action="include/register_user-inc.php">
					<p>
						<label><strong>E-mail</strong><br></label>
						<input type="email" name="email" autofocus="on" autocomplete="on">
					</p>
					<p>
						<label><strong>Name</strong><br></label>
						<input type="text" name="name" autocomplete="on">
					</p>
					<p>
						<label><strong>Password</strong><br></label>
						<input type="password" name="password">
					</p>
					<input type="submit" name="submit" value="Register">				
				</form>
			</div>
			Already have an account? <a href="index.php">Login</a>
		</div>
	</div>

</body>
</html>