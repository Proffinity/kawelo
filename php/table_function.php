<?php
	function getRunning($conn) {
		$output = "";
		$output = '
						<thead>
                            <tr>
                                <th>No</th>
                                <th>Client & Case Detail</th>
                                <th>Court Detail</th>
                                <th>Petitioner vs Respondent</th>
                                <th>Next Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
				  ';

		$sel_running = "SELECT * FROM cases";
		$run_running = mysqli_query($conn, $sel_running);
		while ($row_running = mysqli_fetch_array($run_running)) {
			$caseID = $row_running['ID'];
			$client_name = $row_running['client_name'];
			$respondent_name = $row_running['respondent_name'];
			$case_type = $row_running['case_type'];
            $assign = $row_running['assign'];
			$registration_no = $row_running['registration_no'];

		$sel_court = "SELECT * FROM court_details WHERE ID='$caseID'";
		$run_court = mysqli_query($conn, $sel_court);
		$row_court = mysqli_fetch_array($run_court);
			$court_name = $row_court['court_name'];
			$court_no = $row_court['court_no'];
			$judge_name = $row_court['judge_name'];
			$next_date = $row_court['next_hearing_date'];
			$status = $row_court['case_status'];

		$output .= '
			<tbody>
                <tr>
                    <td>'.$caseID.'</td>
                    <td>
                        <a href="caseDetails.php?caseID='.$caseID.'">
                           <span class="text-info"> <i class="mdi mdi-star-half"></i> '.$client_name.'</span>
                                <br>
                                No: <span>'.$registration_no.'</span>
                                <br>
                                Case: <span>'.$case_type.'</span>
                                <br>
                            <span class="font-weight-bold pb-2">
                                Assign to <br> <br>
                            <span class="btn btn-sm bg-dark text-white p-2">
                                '.$assign.'
                            </span>
                            </span>
                        </a>
                    </td>
                    <td>
                        <span>
                            Court: <b>'.$court_name.'</b>
                        </span>
                        <br>
                        <span>
                            No: '.$court_no.'
                        </span>
                        <br>
                        <span>
                            '.$judge_name.'
                        </span>
                    </td>
                    <td>
                        <span>
                            '.$client_name.'
                        </span>
                        <br>
                        <span>
                            <b>
                                VS
                            </b>
                        </span>
                        <br>
                        <span>
                            '.$respondent_name.'
                        </span>
                    </td>
                    <td>
                        <span>
                            '.$next_date.'
                        </span>
                    </td>
                    <td>
                        <span>
                            '.$status.'
                        </span>
                    </td>
                    <td>
                        <a href="caseEdit.php?caseID='.$caseID.'"><button type="button" class="btn btn-success shadow-sm btn-sm"><i class="icon-paper-pencil"></i> Edit</button></a><br><br>
                        <a href="archiveCase.php?caseID='.$caseID.'"><button type="button" class="btn btn-danger shadow-sm btn-sm"><i class="icon-trash-bin"></i> Archive</button></a>
                    </td>
                </tr>
           </tbody>
		';

		}

		return $output;
	}

	function getImportant($conn, $important) {
		$output = "";
		$output = '
						<thead>
                            <tr>
                                <th>No</th>
                                <th>Client & Case Detail</th>
                                <th>Court Detail</th>
                                <th>Petitioner vs Respondent</th>
                                <th>Next Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
				  ';

		$sel_running = "SELECT * FROM cases WHERE case_category='$important'";
		$run_running = mysqli_query($conn, $sel_running);
		while ($row_running = mysqli_fetch_array($run_running)) {
			$caseID = $row_running['ID'];
			$client_name = $row_running['client_name'];
			$respondent_name = $row_running['respondent_name'];
			$case_type = $row_running['case_type'];
            $assign = $row_running['assign'];
			$registration_no = $row_running['registration_no'];

		$sel_court = "SELECT * FROM court_details WHERE ID='$caseID'";
		$run_court = mysqli_query($conn, $sel_court);
		$row_court = mysqli_fetch_array($run_court);
			$court_name = $row_court['court_name'];
			$court_no = $row_court['court_no'];
			$judge_name = $row_court['judge_name'];
			$next_date = $row_court['next_hearing_date'];
			$status = $row_court['case_status'];

		$output .= '
			<tbody>
                <tr>
                    <td>'.$caseID.'</td>
                    <td>
                        <a href="caseDetails.php?caseID='.$caseID.'" class="">
                           <span class="text-info"> <i class="mdi mdi-star-half"></i> '.$client_name.'</span>
                                <br>
                                No: <span>'.$registration_no.'</span>
                                <br>
                                Case: <span>'.$case_type.'</span>
                                <br>
                            <span class="font-weight-bold pb-2">
                                Assign to <br> <br>
                            <span class="rounded-circle bg-dark text-white p-2">
                                '.$assign.'
                            </span>
                            </span>
                        </a>
                    </td>
                    <td>
                        <span>
                            Court: <b>'.$court_name.'</b>
                        </span>
                        <br>
                        <span>
                            No: '.$court_no.'
                        </span>
                        <br>
                        <span>
                            '.$judge_name.'
                        </span>
                    </td>
                    <td>
                        <span>
                            '.$client_name.'
                        </span>
                        <br>
                        <span>
                            <b>
                                VS
                            </b>
                        </span>
                        <br>
                        <span>
                            '.$respondent_name.'
                        </span>
                    </td>
                    <td>
                        <span>
                            '.$next_date.'
                        </span>
                    </td>
                    <td>
                        <span>
                            '.$status.'
                        </span>
                    </td>
                    <td>
                        <a href="caseEdit.php?caseID='.$caseID.'"><button type="button" class="btn btn-success shadow-sm btn-sm"><i class="icon-paper-pencil"></i> Edit</button></a><br><br>
                        <a href="archiveCase.php?caseID='.$caseID.'"><button type="button" class="btn btn-danger shadow-sm btn-sm"><i class="icon-trash-bin"></i> Archive</button></a>
                    </td>
                </tr>
           </tbody>
		';

		}

		return $output;
	}

    function getClients($conn) {
        $output = "";
        $output =
                '
                    <thead>
                        <tr>
                            <th>Client NO</th>
                            <th>Client Name</th>
                            <th>Phone No</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Residence</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                ';

        $sel_clients = "SELECT * FROM client";
        $run_clients = mysqli_query($conn, $sel_clients);
        while ($row_clients = mysqli_fetch_array($run_clients)) {
            $clientID = $row_clients['ID'];
            $firstName = $row_clients['first_name'];
            $lastName = $row_clients['last_name'];
            $number = $row_clients['mobile_no'];
            $email = $row_clients['email'];
            $address = $row_clients['address'];
            $residence = $row_clients['residence'];

        $output .= '
            <tbody>
                <tr>
                    <td>'.$clientID.'</td>
                    <td>'.$firstName.' '.$lastName.'</td>
                    <td>'.$number.'</td>
                    <td>'.$email.'</td>
                    <td>'.$address.'</td>
                    <td>'.$residence.'</td>
                    <td>
                        <a href="editClient.php?ID='.$clientID.'"><button type="button" class="btn btn-success shadow-sm btn-sm"><i class="icon-paper-pencil"></i> Edit</button></a>
                        <a href="deleteClient.php?ID='.$clientID.'"><button type="button" class="btn btn-danger shadow-sm btn-sm"><i class="icon-trash-bin"></i> Delete</button></a>
                    </td>

                </tr>
            </tbody>
        ';

        }

       return $output;
    }

    function getUsers($conn) {
        $output = "";
        $output =
            '
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Employee ID</th>
                        <th>Full Name</th>
                        <th>Start Date</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Phone NO</th>
                        <th>Action</th>
                    </tr>
                </thead>
            ';

        $sel_users = "SELECT * FROM users";
        $run_users = mysqli_query($conn, $sel_users);
        while ($row_users = mysqli_fetch_array($run_users)) {
            $ID = $row_users['ID'];
            $userID = $row_users['userID'];
            $firstName = $row_users['first_name'];
            $lastName = $row_users['last_name'];
            $image = $row_users['image_path'];
            $startDate = $row_users['start_date'];
            $role = $row_users['role'];
            $email = $row_users['email'];
            $phone = $row_users['mobile_no'];
            $address = $row_users['home_address'];
            $district = $row_users['home_district'];

            $output .='
                <tbody>
                    <tr>
                        <td>
                            <img src="images/'.$image.'" class="img-fluid" alt="userImage" height="69" width="85">
                        </td>
                        <td>'.$userID.'</td>
                        <td>'.$firstName.' '.$lastName.'</td>
                        <td>'.$startDate.'</td>
                        <td>'.$role.'</td>
                        <td>'.$email.'</td>
                        <td>'.$phone.'</td>
                        <td>
                            <a href="editUser.php?ID='.$ID.'"><button type="button" class="btn btn-success shadow-sm btn-sm"><i class="icon-paper-pencil"></i> Edit</button></a>
                            <a href="deleteUser.php?ID='.$userID.'"><button type="button" class="btn btn-danger shadow-sm btn-sm"><i class="icon-trash-bin"></i> Delete</button></a>
                        </td>

                    </tr>
                </tbody>
            ';
        }

        return $output;
    }

    function getCaseDetailsOne($caseID, $conn) {
        $output = "";
        $output =
            '
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            ';

        $sel_cases = "SELECT * FROM cases WHERE ID='$caseID'";
        $run_cases = mysqli_query($conn, $sel_cases);
        $row_cases = mysqli_fetch_array($run_cases);
            $caseType = $row_cases['case_type'];
            $filingNumber = $row_cases['filling_no'];
            $filingDate = $row_cases['filling_date'];
            $registrationNumber = $row_cases['registration_no'];
            $registrationDate = $row_cases['registration_date'];
            $assign = $row_cases['assign'];

        $output .='
            <tbody>
                <tr>
                    <th scope="row">Case type</th>
                    <td>'.$caseType.'</td>
                </tr>
                <tr>
                    <th scope="row">Filling No</th>
                    <td>'.$filingNumber.'</td>


                </tr>
                <tr>
                    <th scope="row">Filling Date</th>
                    <td>'.$filingDate.'</td>
                </tr>
                <tr>
                    <th scope="row">Registration No</th>
                    <td>'.$registrationNumber.'</td>

                </tr>
                <tr>
                    <th scope="row">Registration Date</th>
                    <td>'.$registrationDate.'</td>

                </tr>
                <tr>
                    <th scope="row">Assigned To</th>
                    <td>'.$assign.'</td>

                </tr>
            </tbody>
        ';

        return $output;
    }

    function getCaseDetailsTwo($caseID, $conn) {
        $output = "";
        $output =
            '
               <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            ';

        $sel_court = "SELECT * FROM court_details WHERE caseID='$caseID'";
        $run_court = mysqli_query($conn, $sel_court);
        $row_court = mysqli_fetch_array($run_court);
            $firstHearing = $row_court['first_hearing_date'];
            $nextHearing = $row_court['next_hearing_date'];
            $status = $row_court['case_status'];
            $courtNumber = $row_court['court_no'];
            $courtName = $row_court['court_name'];
            $judge = $row_court['judge_name'];

        $output .='
            <tbody>
                <tr>
                    <th scope="row">First Hearing Date</th>
                    <td>'.$firstHearing.'</td>
                </tr>
                <tr>
                    <th scope="row">Next Hearing Date</th>
                    <td>'.$nextHearing.'</td>


                </tr>
                <tr>
                    <th scope="row">Case Status</th>
                    <td>'.$status.'</td>
                </tr>
                <tr>
                    <th scope="row">Court Name</th>
                    <td>'.$courtName.'</td>

                </tr>
                <tr>
                    <th scope="row">Court No</th>
                    <td>'.$courtNumber.'</td>

                </tr>
                <tr>
                    <th scope="row">Judge</th>
                    <td>'.$judge.'</td>

                </tr>

            </tbody>
        ';

        return $output;
    }

    function getPetitioner($caseID, $conn) {
        $output = "";

        $sel_cases = "SELECT * FROM cases WHERE ID='$caseID'";
        $run_cases = mysqli_query($conn, $sel_cases);
        $row_cases = mysqli_fetch_array($run_cases);
            $petitioner = $row_cases['client_name'];
            $respondent = $row_cases['respondent_name'];

        $output =
            '
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="table-responsive">
                            <p class="header-title">
                                Petitioner Name
                            </p>
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">'.$petitioner.'</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="table-responsive">
                            <p class="header-title">
                                Respondent Name
                            </p>
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">'.$respondent.'</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            ';

        return $output;
    }

    function getAppointments($conn) {
        $output = "";
        $output =
            '
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>date</th>
                        <th>Phone No.</th>
                        <th>time</th>
                        <th>Status</th>
                        <th>action</th>

                    </tr>
                </thead>
            ';

        $sel_appointments = "SELECT * FROM appointments";
        $run_appointments = mysqli_query($conn, $sel_appointments);
        while ($row_appointments = mysqli_fetch_array($run_appointments)) {
            $ID = $row_appointments['ID'];
            $clientName = $row_appointments['client_name'];
            $appointmentDate = $row_appointments['date'];
            $phoneNumber = $row_appointments['phone_no'];
            $appointTime = $row_appointments['time'];
            $status = $row_appointments['status'];

            $output .='
                <tbody>
                    <tr>
                        <td>'.$clientName.'</td>
                        <td>'.$appointmentDate.'</td>
                        <td>'.$phoneNumber.'</td>
                        <td>'.$appointTime.'</td>
                        <td>'.$status.'</td>
                        <td>
                            <a type="button"  href="EditAppointment.php?ID='.$ID.'" class="btn btn-success shadow-sm btn-sm"><i class="icon-paper-pencil"></i> Edit</a>
                            <a type="button"  href="deleteAppointment.php?ID='.$ID.'" class="btn btn-danger shadow-sm btn-sm"><i class="icon-trash-bin"></i> Delete</a>
                        </td>
                    </tr>
                </tbody>
            ';
        }

        return $output;
    }

    function getLogs($conn) {
        $output = "";
        $output =
            '
                <thead>
                    <tr>
                        <th>Log_No</th>
                        <th>Name</th>
                        <th>date</th>
                        <th>Log in time</th>
                        <th>log out time</th>
                    </tr>
                </thead>
            ';

        $sel_logs = "SELECT * FROM logs ORDER BY ID DESC";
        $run_logs = mysqli_query($conn, $sel_logs);
        while ($row_logs = mysqli_fetch_array($run_logs)) {
            $logID = $row_logs['ID'];
            $firstName = $row_logs['first_name'];
            $lastName = $row_logs['last_name'];
            $date = $row_logs['date'];
            $log_in_time = $row_logs['log_in_time'];
            $log_out_time = $row_logs['log_out_time'];

            $output .= '
                <tbody>
                    <tr>
                        <td>'.$logID.'</td>
                        <td>'.$firstName.' '.$lastName.'</td>
                        <td>'.$date.'</td>
                        <td>'.$log_in_time.'</td>
                        <td>'.$log_out_time.'</td>
                    </tr>
                </tbody>
            ';
        }

        return $output;

    }


?>
