<?php
	function User_role($userID, $conn) {
	    //Query for Validating if User Exists
	    $sel_user = "SELECT * FROM users WHERE userID='$userID'";
	    $run_user = mysqli_query($conn, $sel_user);
	    $row_user = mysqli_fetch_array($run_user);
	    	$output = $row_user['role'];

	    return $output;
	}

	function User_details($userID, $conn) {
	    //Query for Validating if User Exists
	    $sel_user = "SELECT * FROM users WHERE userID='$userID'";
	    $run_user = mysqli_query($conn, $sel_user);
	    $row_user = mysqli_fetch_array($run_user);
	    	$output = $row_user['first_name'];

	    return $output;
	}
?>