<?php

session_start();

include 'dbh-inc.php';

if (isset($_POST['submit'])) {
	// sanitize
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));

	if (empty($email) || empty($password)  || empty($name)) {
		// show error message
		header("Location: ../register.php?error=empty");
		exit();
	} else {
		$sql = "INSERT INTO user (`user_name`, `user_password`, `name`) VALUES ('$email', '$password', '$name');";
		$status = mysqli_query($conn, $sql);

		if ($status) {
			header("Location: ../index.php?success=created");
			exit();
		} else {
			header("Location: ../register.php?error=fail");
			exit();
		}
	}
} else {
	header("Location: ../index.php");
	exit();
}