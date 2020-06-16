<?php
	session_start();

	if (!isset($_SESSION['u_id'])) {
		header("Location: index.php");
		exit();
	}

	include 'include/dbh-inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Events</title>
	<link rel="stylesheet" type="text/css" href="src/register-attendee.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
</head>
<body>
	<?php include 'include/header-nav.php'; ?>

	<div class="register-attendee">
		<div class="register-attendee-container">
			<div class="register-attendee-form">
				<form method="POST" action="include/register_attendee-inc.php">
					<p>
						<label><strong>Event: </strong></label>
						<select name="event">
							<option disabled selected hidden>Select an event</option>
							<?php
				 				$u_id = $_SESSION['u_id'];
								$sql = "SELECT * FROM event WHERE user_id = '$u_id'";
								$result = mysqli_query($conn, $sql);
								$checkResult = mysqli_num_rows($result);
								$eventDatas = array();

								while($row = mysqli_fetch_row($result)) { //put table result in 2D array
									$eventDatas[] = $row;
								}

								foreach ($eventDatas as $eventData) {
									echo '
									<option value="'.$eventData[0].'">'.$eventData[1].'</option>
									';
								}
							?>
						</select>
					</p>
					<p>
						<label><strong>Name:</strong></label>
						<input type="text" name="attendee-name" placeholder="John Doe">
					</p>
					<p>
						<label><strong>NRIC: </strong></label>
						<input type="text" name="attendee-nric" pattern="\d{6}-\d{2}-\d{4}" placeholder="971107-56-5397">
					</p>
					<p>
						<label><strong>Phone no:</strong></label>
						<input type="text" name="attendee-phone" pattern="\d{3}{6}" placeholder="018-2702829">
					</p>
					<p>
						<label><strong>E-Mail:</strong></label>
						<input type="email" name="attendee-email" placeholder="johndoe@gmail.com">
					</p>
					<input type="submit" name="submit" value="Register">
				</form>
			</div>
		</div>
	</div>	
</body>
</html>