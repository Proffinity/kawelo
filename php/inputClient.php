<?php
require '../DB/connect.inc.php';

if (isset($_GET['firstName']) && isset($_GET['otherName']) && isset($_GET['lastName']) && isset($_GET['gender']) && isset($_GET['phoneNumber']) && isset($_GET['email']) && isset($_GET['homeAddress']) && isset($_GET['residence']) && isset($_GET['cases'])) {
	$firstName = $_GET['firstName'];
	$otherName = $_GET['otherName'];
	$lastName = $_GET['lastName'];
	$gender = $_GET['gender'];
	$phoneNumber = $_GET['phoneNumber'];
	$email = $_GET['email'];
	$homeAddress = $_GET['homeAddress'];
	$residence = $_GET['residence'];
	$cases = $_GET['cases'];

	if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($phoneNumber) && !empty($email) && !empty($homeAddress) && !empty($residence) && !empty($cases)) {
		$insert_client = "INSERT INTO client(first_name,middle_name,last_name,gender,email,mobile_no,address,residence,cases) VALUES('$firstName','$otherName','$lastName','$gender','$email','$phoneNumber','$homeAddress','$residence','$cases')";
		$run_client = mysqli_query($conn, $insert_client);

		echo 
			"
				<div class=\"alert alert-success mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
	                <strong>Notification!</strong> Client was Successfully Entered!
	                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
	                    <span aria-hidden=\"true\">&times;</span>
	                </button>
	            </div>
			";
	} else {
		echo 
			"
				<div class=\"alert alert-warning mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
	                <strong>Notification!</strong> All Fields are Required Except Other name is Optional!
	                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
	                    <span aria-hidden=\"true\">&times;</span>
	                </button>
	            </div>
			";
	}

	
}