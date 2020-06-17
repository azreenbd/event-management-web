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
	<title>Events | EveMaSys - Event Management System</title>
	<link rel="stylesheet" type="text/css" href="src/style.css">
	<!--<link rel="stylesheet" type="text/css" href="src/events.css">-->
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
			<h1>Upcoming Events</h1>
			<p>Click on an event for details.</p>

			<div class="event-list">
				<?php
	 				$u_id = $_SESSION['u_id'];

					$sql = "SELECT * FROM event WHERE user_id = '$u_id'";
					$result = mysqli_query($conn, $sql);
					$totalEvent = mysqli_num_rows($result);
					$eventDatas = array();

					if ($totalEvent < 1) {
						echo '<p>No event registered.</p>';
					} else {
						while($row = mysqli_fetch_row($result)) { //put table result in 2D array
							$eventDatas[] = $row;
						}

						foreach ($eventDatas as $eventData) {
							echo '
							<div class="card event" onclick="window.location.href = \'event-detail.php?id='.$eventData[0].'\'">
								<div class="top"><h1>'.$eventData[1].'</h1></div>
								<div class="bottom">
									<table>
										<tr>
											<td id="date" align="center" style="width:50%"><i class="far fa-calendar-alt"></i> '.date("d/m/Y", strtotime($eventData[2])).'</td>
											<td id="time" align="center" style="width:50%"><i class="far fa-clock"></i> '.date("g:ia", strtotime($eventData[3])).'</td>
										</tr>
										<tr>
											<td id="venue" align="center" style="width:50%"><i class="fas fa-map-marker-alt"></i> '.$eventData[4].'</td>
											<td id="attendees" align="center" style="width:50%"><i class="fas fa-users"></i> '.$eventData[5].'</td>
										</tr>
									</table>
								</div>
							</div>
							';
						}
					}
				?>
			</div>
		</div>
	</div>
	<footer class="footer-dark">
		<?php include 'include/footer.php'; ?>
	</footer>
</body>
</html>