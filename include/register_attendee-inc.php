<?php

session_start();

include 'dbh-inc.php';

if (isset($_POST['submit'])) {
	$eve_id = mysqli_real_escape_string($conn, $_POST['event']);
	$attendee_name = mysqli_real_escape_string($conn, $_POST['attendee-name']);
	$attendee_nric = mysqli_real_escape_string($conn, $_POST['attendee-nric']);
	$attendee_phone = mysqli_real_escape_string($conn, $_POST['attendee-phone']);
	$attendee_email = mysqli_real_escape_string($conn, $_POST['attendee-email']);

	$sql = "INSERT INTO attendee (`att_name`, `att_nric`, `att_phone_num`, `att_email`, `eve_id`) VALUES ('$attendee_name', '$attendee_nric', '$attendee_phone', '$attendee_email', '$eve_id');";
	mysqli_query($conn, $sql);

	header("Location: ../event-detail.php?id=".$eve_id);
	exit();
} else {
	header("Location: ../events.php");
	exit();
}