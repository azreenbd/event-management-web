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
	<title>EveMaSys - Event Management System</title>
	<link rel="stylesheet" type="text/css" href="src/style.css">
</head>
<body class="bg">
	<div class="container">
		<div class="text-center" style="margin: 2.5rem 0;">
			<h1 class="font-cursive" style="font-size: 3rem; margin: 0; color: #fff; text-shadow: 0 .125rem .125rem rgba(0,0,0,.25)">
				Evema<span style="color: #ff5c62">Sys</span>
			</h1>
			<small style="color: rgba(255,255,255,.5)">Event Management System</small>
		</div>
		
		<div class="card">
			<div class="form-group">
				<form method="POST" action="include/login-inc.php">
					<div class="form-item">
						<label>E-mail</label>
						<input type="email" name="email" placeholder="E-mail" autofocus="on" autocomplete="on">
					</div>
					<div class="form-item">
						<label>Password</label>
						<input type="password" name="password" placeholder="Password">
					</div>
					<div class="form-item">
						<input type="submit" name="submit" value="Login">
					</div>			
				</form>
			</div>

			<div class="text-center">
				<small>No account? <a href="register.php">Register</a></small>
			</div>
		</div>
	</div>

</body>
</html>