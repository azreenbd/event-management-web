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
	<link rel="stylesheet" type="text/css" href="src/events.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<?php include 'include/header-nav.php'; ?>

	<div class="event-container">
		<h1>Upcoming Events</h1>
		<p>Click on an event for details.</p>
		<hr>
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
						<div class="event" onclick="window.location.href = \'event-detail.php?id='.$eventData[0].'\'">
							<table>
								<theader>
									<tr>
										<th colspan="4"><h1>'.$eventData[1].'</h1></th>
									</tr>
								</theader>
								<tbody>
									<tr>
										<td align="right"><i class="far fa-calendar-alt"></i></td>
										<td id="date" align="center">'.$eventData[2].'</td>
										<td align="right"><i class="far fa-clock"></i></td>
										<td id="time" align="center">'.$eventData[3].'</td>
									</tr>
									<tr>
										<td align="right"><i class="fas fa-map-marker-alt"></i></td>
										<td id="venue" align="center">'.$eventData[4].'</td>
										<td align="right"><i class="fas fa-users"></i></td>
										<td id="attendees" align="center">'.$eventData[5].'</td>
									</tr>
								</tbody>
							</table>
						</div>
						';
					}
				}
			?>
		</div>
	</div>

</body>
</html>