<?php

session_start();

include 'dbh-inc.php';

if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($conn, $_POST['event-name']);
	$date = mysqli_real_escape_string($conn, $_POST['event-date']);
	$time = mysqli_real_escape_string($conn, $_POST['event-time']);
	$venue = mysqli_real_escape_string($conn, $_POST['event-venue']);
	$quota = mysqli_real_escape_string($conn, $_POST['event-quota']);
	$desc = mysqli_real_escape_string($conn, $_POST['event-description']);
	$u_id = $_SESSION['u_id'];

	$sql = "INSERT INTO event (`eve_name`, `eve_date`, `eve_time`, `eve_venue`, `eve_max_num_att`, `eve_desc`, `user_id`) VALUES ('$name', '$date', '$time', '$venue', '$quota', '$desc', '$u_id');";
	mysqli_query($conn, $sql);

	$eve_id = mysqli_insert_id($conn);

	$i = 0;
	$agenda_time = array();
	$agenda_desc = array();
	while(true) { 
		if($_POST['agenda-time-'.$i] != null) {
			$agenda_time[$i] = mysqli_real_escape_string($conn, $_POST['agenda-time-'.$i]);
			$agenda_desc[$i] = mysqli_real_escape_string($conn, $_POST['agenda-description-'.$i]);
			$i++;
		} else {
			break;
		}
	}

	for ($i=0; $i < sizeof($agenda_time) ; $i++) {
		$agenda_time_copy = $agenda_time[$i];
		$agenda_desc_copy = $agenda_desc[$i];

		$sql = "INSERT INTO tentative (`tent_time`, `tent_desc`, `eve_id`) VALUES ('$agenda_time_copy', '$agenda_desc_copy', '$eve_id');";
		mysqli_query($conn, $sql);
	}

	header("Location: ../events.php");
	exit();
} else {
	header("Location: ../events.php");
	exit();
}