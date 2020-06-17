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
	<title>Register Attendee | EveMaSys - Event Management System</title>
	<link rel="stylesheet" type="text/css" href="src/style.css">
	<!--<link rel="stylesheet" type="text/css" href="src/register-attendee.css">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
</head>
<body>
	<?php include 'include/header-nav.php'; ?>

	<div class="container flex-layout">
		<div class="sidebar">
			<h2>Hello, <br><?php echo $_SESSION['name']; ?>!</h2>

			<a href="register-event.php" class="btn">New Event</a>

			<ul class="plain-list text-center">
				<!--<li><a href="events.php"><h3>Event List</h3></a></li>-->
				<li><a href="register-committee.php">Add Committee Member</a></li>
				<li><a href="register-attendee.php">Register Attendee</a></li>						
			</ul>	
		</div>
		<div class="main">
			<h1>Register Attendee</h1>
			<div class="panel">
			
				<div class="form-group">
					<form method="POST" action="include/register_attendee-inc.php">
						<div class="form-item">
							<label>Event</label>
							<select name="event" autofocus="on">
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
						</div>
						<div class="form-item">
							<label>Name</label>
							<input type="text" name="attendee-name" placeholder="John Doe">
						</div>
						<div class="form-item">
							<label>NRIC</label>
							<input type="text" name="attendee-nric" pattern="\d{6}-\d{2}-\d{4}" placeholder="XXXXXX-XX-XXXX">
						</div>
						<div class="form-item">
							<label>Phone no</label>
							<input type="text" name="attendee-phone" pattern="\d{3}{6}" placeholder="012-3456789">
						</div>
						<div class="form-item">
							<label>E-Mail</label>
							<input type="email" name="attendee-email" placeholder="johndoe@gmail.com">
						</div>
						<input type="submit" name="submit" value="Register">
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer-dark">
		<?php include 'include/footer.php'; ?>
	</footer>
</body>
</html>