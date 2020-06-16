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
	<title>Register | EveMaSys - Event Management System</title>
	<link rel="stylesheet" type="text/css" href="src/style.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center">Register</h1>
		<div class="card">
			<div class="form-group">
				<form method="POST" action="include/register_user-inc.php">
					<div class="form-item">
						<label>E-mail</label>
						<input type="email" name="email" placeholder="E-mail" autofocus="on" autocomplete="on">
					</div>
					<div class="form-item">
						<label>Name</label>
						<input type="text" name="name" placeholder="Name" autocomplete="on">
					</div>
					<div class="form-item">
						<label>Password</label>
						<input type="password" name="password" placeholder="Password">
					</div>
					<div class="form-item">
						<input type="submit" name="submit" value="Register">
					</div>			
				</form>
			</div>
			<div class="text-center">
			<small>Already have an account? <a href="index.php">Login</a></small>
			</div>
		</div>
	</div>

</body>
</html>