<?php
require '../DB/connect.inc.php';

if (isset($_GET['clientName']) && isset($_GET['number']) && isset($_GET['appointmentDate']) && isset($_GET['appointmentTime'])) {
	$clientName = $_GET['clientName'];
	$number = $_GET['number'];
	$appointmentDate = $_GET['appointmentDate'];
	$appointmentTime = $_GET['appointmentTime'];
	$status = "OPEN";

	if (!empty($clientName) && !empty($number) && !empty($appointmentDate) && !empty($appointmentTime)) {
		$insert_appointment = "INSERT INTO appointments(client_name,date,phone_no,time,status) VALUES('$clientName','$appointmentDate','$number','$appointmentTime','$status')";
		$run_appointment = mysqli_query($conn, $insert_appointment);

		echo 
			"
				<div class=\"alert alert-success mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
	                <strong>Notification!</strong> Appointment was Successfully Entered!
	                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
	                    <span aria-hidden=\"true\">&times;</span>
	                </button>
	            </div>
			";
	} else {
		echo 
			"
				<div class=\"alert alert-warning mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
	                <strong>Notification!</strong> All Fields are Required!
	                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
	                    <span aria-hidden=\"true\">&times;</span>
	                </button>
	            </div>
			";
	}
}