<?php
require '../DB/connect.inc.php';

if (isset($_GET['full_name']) && isset($_GET['category']) && isset($_GET['case_type']) && isset($_GET['assign']) && isset($_GET['registration_no']) && isset($_GET['registration_date']) && isset($_GET['courtName']) && isset($_GET['courtNumber']) && isset($_GET['judgeName']) && isset($_GET['respondent_name']) && isset($_GET['filing_no']) && isset($_GET['filing_date']) && isset($_GET['firstDate']) && isset($_GET['nextDate']) && isset($_GET['status'])) {

	$fullName = $_GET['full_name'];
	$category = $_GET['category'];
	$caseType = $_GET['case_type'];
	$assign = $_GET['assign'];
	$registrationNumber = $_GET['registration_no'];
	$registrationDate = $_GET['registration_date'];
	$court_name = $_GET['courtName'];
	$court_no = $_GET['courtNumber'];
	$judge_name = $_GET['judgeName'];
	$respondentName = $_GET['respondent_name'];
	$filingNumber = $_GET['filing_no'];
	$filingDate = $_GET['filing_date'];
	$first_date = $_GET['firstDate'];
	$next_date = $_GET['nextDate'];
	$status = $_GET['status'];

	if (!empty($fullName) && !empty($caseType) && !empty($court_name) && !empty($judge_name) && !empty($respondentName)) {
		$sel_regNumber = "SELECT * FROM cases WHERE registration_no='$registrationNumber'";
		$run_regNumber = mysqli_query($conn, $sel_regNumber);
		$check_regNumber = mysqli_num_rows($run_regNumber);
		if ($check_regNumber==1) {
			echo 
				"
					<div class=\"alert alert-warning mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
		                <strong>Notification!</strong> The Registration Number Already in Use!
		                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
		                    <span aria-hidden=\"true\">&times;</span>
		                </button>
		            </div>
				";
		} else {
			$insertCase = "INSERT INTO cases(case_category,client_name,respondent_name,case_type,assign,filling_no,filling_date,registration_no,registration_date) VALUES('$category','$fullName','$respondentName','$caseType','$assign','$filingNumber','$filingDate','$registrationNumber','$registrationDate')";
			$run_insertCase = mysqli_query($conn, $insertCase);

			$sel_cases = "SELECT * FROM cases WHERE registration_no='$registrationNumber'";
			$run_cases = mysqli_query($conn, $sel_cases);
			$row_cases = mysqli_fetch_array($run_cases);
				$caseID = $row_cases['ID'];

			$insertCourt = "INSERT INTO court_details(caseID,court_name,judge_name,first_hearing_date,next_hearing_date,case_status,court_no) VALUES('$caseID','$court_name','$judge_name','$first_date','$next_date','$status','$court_no')";
			$run_insertCase = mysqli_query($conn, $insertCourt);

			echo 
				"
					<div class=\"alert alert-success mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
		                <strong>Notification!</strong> Case and Court Details Have been Successfully Entered!
		                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
		                    <span aria-hidden=\"true\">&times;</span>
		                </button>
		            </div>
				";
		}
	} else {
		echo 
			"
				<div class=\"alert alert-warning mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
	                <strong>Notification!</strong> Please Enter the Key Information!
	                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
	                    <span aria-hidden=\"true\">&times;</span>
	                </button>
	            </div>
			";
	}

	/*
	echo 
		"
			<div class=\"alert alert-success mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
                <strong>Notification!</strong> $fullName $category $caseType $assign $registrationNumber $registrationDate $court_name $court_no $judge_name $respondentName $filingNumber $filingDate $first_date $next_date $status
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
		";
	*/
}

?>