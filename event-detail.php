<?php
	session_start();

	if (!isset($_SESSION['u_id'])) {
		header("Location: index.php");
		exit();
	}

	if(isset($_GET['id']) ) {
		$eve_id = $_GET['id'];
	} else {
		header("Location: index.php");
		exit();
	}

	include 'include/dbh-inc.php';

	$u_id = $_SESSION['u_id'];
	// Get event data.
	$sql = "SELECT * FROM event WHERE eve_id = '$eve_id'";
	$result = mysqli_query($conn, $sql);
	$checkResult = mysqli_num_rows($result);
	$eventDatas = array();
	$eventName;

	// if no result, go back to index.php
	if ($checkResult < 1) {
		header("Location: index.php");
		exit();
	} else {
		while($row = mysqli_fetch_row($result)) { // put table result in 2D array
			$eventDatas[] = $row;
		}

		foreach ($eventDatas as $eventData) {
			// if event creator is not the logged in user
			if ($eventData[7] != $_SESSION['u_id']) {
				header("Location: index.php");
				exit();
			} else {
				// set event name for title
				$eventName = $eventData[1];
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $eventName ?> | EveMaSys - Event Management System</title>
	<link rel="stylesheet" type="text/css" href="src/style.css">
	<!--<link rel="stylesheet" type="text/css" href="src/event-detail.css">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
</head>
<body>
	<?php include 'include/header-nav.php'; ?>

	<div class="container">
		<div class="event-details-container">
			<?php
				foreach ($eventDatas as $eventData) {
					echo '
					<h1>'.$eventData[1].'</h1>
					<table >			
						<tr>
							<td>Date: '.date("d/m/Y", strtotime($eventData[2])).'</td>
						</tr>
						<tr>
							<td>Time: '.$eventData[3].'</td>
						</tr>
						<tr>
							<td>Venue: '.$eventData[4].'</td>
						</tr>
						<tr>
							<td>Max. no. of attendees: '.$eventData[5].'</td>
						</tr>
						<tr>
							<td>Description: '.$eventData[6].'</td>
						</tr>
					</table>

					<h1>Agenda</h1>';

					//Agenda or tentative table

					$sql = "SELECT * FROM tentative WHERE eve_id = '$eve_id' ORDER BY tent_time ";
					$result = mysqli_query($conn, $sql);
					$totalTentative = mysqli_num_rows($result);
					$tentativeDatas = array();

					if ($totalTentative < 1) {
						echo '<table><tr><td>No agenda provided.</td></tr></table>';
					} else {
						while($row = mysqli_fetch_row($result)) { //put table result in 2D array
							$tentativeDatas[] = $row;
						}

						echo '
							<table id="agenda">
								<thead>
									<tr>
										<th>Time</th>
										<th>Agenda</th>
									</tr>
								</thead>
								<tbody>
						';

						foreach ($tentativeDatas as $tentativeData) {
							echo '
									<tr>
										<td>'.$tentativeData[1].'</td>
										<td>'.$tentativeData[2].'</td>
									</tr>
							';
						}

						echo '
							</tbody>
						</table>
						';
					}

					//Committee Members table
					$sql = "SELECT * FROM committee WHERE eve_id = '$eve_id'";
					$result = mysqli_query($conn, $sql);
					$totalCommittee = mysqli_num_rows($result);
					$committeeDatas = array();

					echo '
						<h1>Committee Members</h1>
					';

					if ($totalCommittee < 1) {
						echo '<table><tr><td>No committee available.</td></tr></table>';
					} else {
						while($row = mysqli_fetch_row($result)) { //put table result in 2D array
							$committeeDatas[] = $row;
						}

						echo '
							<table id="committee-members">
								<thead>
									<tr>
										<th>Name</th>
										<th>Division</th>
										<th>NRIC</th>
										<th>Phone</th>
										<th>E-Mail</th>
									</tr>
								</thead>
								<tbody>
						';

						foreach ($committeeDatas as $committeeData) {
							echo '
								<tr>
									<td>'.$committeeData[1].'</td>
									<td>'.$committeeData[2].'</td>
									<td>'.$committeeData[3].'</td>
									<td>'.$committeeData[4].'</td>
									<td>'.$committeeData[5].'</td>
								</tr>
							';
						}
						echo '
							</tbody>
							</table>
						';
					}

					//Attendees table
					$sql = "SELECT * FROM attendee WHERE eve_id = '$eve_id'";
					$result = mysqli_query($conn, $sql);
					$totalAttendee = mysqli_num_rows($result);
					$attendeeDatas = array();

					echo '
						<h1>Attendees</h1>
					';

					//get tentative
					if ($totalAttendee < 1) {
						echo '<table><tr><td>No attendee available.</td></tr></table>';
					} else {
						while($row = mysqli_fetch_row($result)) { //put table result in 2D array
							$attendeeDatas[] = $row;
						}

						echo '
							<table id="attendees">
								<thead>
									<tr>
										<th>Name</th>
										<th>NRIC</th>
										<th>Phone</th>
										<th>E-Mail</th>
									</tr>
								</thead>
								<tbody>
						';

						foreach ($attendeeDatas as $attendeeData) {
							echo '
								<tr>
									<td>'.$attendeeData[1].'</td>
									<td>'.$attendeeData[2].'</td>
									<td>'.$attendeeData[3].'</td>
									<td>'.$attendeeData[4].'</td>
								</tr>
							';
						}
						echo '
							</tbody>
							</table>
						';
					}
				}
			?>
		</div>
	</div>
</body>
</html>