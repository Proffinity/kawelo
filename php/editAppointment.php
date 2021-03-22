<?php
require '../DB/connect.inc.php';

if (isset($_GET['clientName']) && isset($_GET['clientID']) && isset($_GET['clientNumber']) && isset($_GET['date']) && isset($_GET['time']) && isset($_GET['status'])) {
	$clientName = $_GET['clientName'];
	$ID = $_GET['clientID'];
	$clientNumber = $_GET['clientNumber'];
	$date = $_GET['date'];
	$time = $_GET['time'];
	$status = $_GET['status'];

	$update_appointment = "UPDATE appointments SET client_name='$clientName', date='$date', phone_no='$clientNumber', time='$time', status='$status' WHERE ID='$ID'";
	$run_appointment = mysqli_query($conn, $update_appointment);

	if ($run_appointment) {
		echo 
			"
				<div class=\"alert alert-success mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
	                <strong>Notification!</strong> Appointment Update was Successfull!
	                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
	                    <span aria-hidden=\"true\">&times;</span>
	                </button>
	            </div>
			";
	} else {
		echo 
			"
				<div class=\"alert alert-warning mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
	                <strong>Notification!</strong> Sorry Your Information was not Updated!
	                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
	                    <span aria-hidden=\"true\">&times;</span>
	                </button>
	            </div>
			";
	}
}