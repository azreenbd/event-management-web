<?php

session_start();

include 'dbh-inc.php';

if (isset($_POST['submit'])) {
	$eve_id = mysqli_real_escape_string($conn, $_POST['event']);
	$committee_name = mysqli_real_escape_string($conn, $_POST['committee-name']);
	$division = mysqli_real_escape_string($conn, $_POST['division']);
	$committee_nric = mysqli_real_escape_string($conn, $_POST['committee-nric']);
	$committee_phone = mysqli_real_escape_string($conn, $_POST['committee-phone']);
	$committee_email = mysqli_real_escape_string($conn, $_POST['committee-email']);

	$sql = "INSERT INTO committee (`comm_name`, `comm_div`, `comm_nric`, `comm_phone_num`, `comm_email`, `eve_id`) VALUES ('$committee_name', '$division', '$committee_nric', '$committee_phone', '$committee_email', '$eve_id');";
	mysqli_query($conn, $sql);

	header("Location: ../event-detail.php?id=".$eve_id);
	exit();
} else {
	header("Location: ../events.php");
	exit();
}