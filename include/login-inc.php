<?php

session_start();

if (isset($_POST['submit'])) {
	include 'dbh-inc.php';

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));

	if (empty($email) || empty($password)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM user WHERE user_name='$email'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				if ($password == $row['user_password']) {
					//login the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['email'] = $row['user_name'];
					$_SESSION['name'] = $row['name'];

					header("Location: ../events.php");
					exit();
				} else {
					header("Location: ../index.php?login=error");
					exit();
				}
			}

		}
	}

} else {
	header("Location: ../index.php?login=error");
	exit();
}