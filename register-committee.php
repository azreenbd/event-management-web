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
	<link rel="stylesheet" type="text/css" href="src/style.css">
	<!--<link rel="stylesheet" type="text/css" href="src/register-committee.css">-->
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
			<h1>Add Committee Member</h1>
			<div class="panel">
			
				<div class="form-group">
					<form method="POST" action="include/register_committee-inc.php">
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
							<input type="text" name="committee-name" placeholder="John Doe">
						</div>
						<div class="form-item">
							<label>Division</label><br>
							<select name="division">
								<option disabled selected hidden>Select a division</option>
								<option value="Event Management">Event management</option>
								<option value="Logistics">Logistics</option>
								<option value="Sponsorship">Sponsorship</option>
							</select>
						</div>
						<div class="form-item">
							<label>NRIC</label>
							<input type="text" name="committee-nric" pattern="\d{6}-\d{2}-\d{4}" placeholder="XXXXXX-XX-XXXX">
						</div>
						<div class="form-item">
							<label>Phone no.</label>
							<input type="text" name="committee-phone" pattern="\d{3}{6}" placeholder="012-3456789">
						</div>
						<div class="form-item">
							<label>E-Mail</label>
							<input type="email" name="committee-email" placeholder="johndoe@gmail.com">
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