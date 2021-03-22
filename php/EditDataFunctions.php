<?php

	function getAppointments($conn, $ID) {
		$output = "";

		$sel_appointments = "SELECT * FROM appointments WHERE ID='$ID'";
		$run_appointments = mysqli_query($conn, $sel_appointments);
		$row_appointments = mysqli_fetch_array($run_appointments);
			$clientName = $row_appointments['client_name'];
			$appointmentDate = $row_appointments['date'];
			$clientNnumber = $row_appointments['phone_no'];
			$appointmentTime = $row_appointments['time'];
			$appointmentStatus = $row_appointments['status'];

		$output ='
			<div class="col">
                <label for="Phone&Number">
                    full Name
                </label>
                <input type="text" target="'.$ID.'" value="'.$clientName.'" class="form-control" id="clientName">
            </div>
            <div class="col">
                <label for="No">
                    Phone NO:
                </label>
                <input type="text" value="'.$clientNnumber.'" class="form-control" id="clientNumber">
            </div>
            <div class="col">
                <label for="date">
                    Date
                </label>
                <input type="date" value="'.$appointmentDate.'" class="form-control" id="date">
            </div>
            <div class="col">
                <label for="Case">
                    Time
                </label>
                <input type="time" value="'.$appointmentTime.'" class="form-control" id="time">
            </div>
            <div class="col">
                <label for="status">
                    Status
                </label>
                <select  class="form-control" id="status">
                <option data-value="'.$appointmentStatus.'">'.$appointmentStatus.'</option>
                <option data-value="OPEN">Open</option>
                <option data-value="Canceled by Client">Canceled by Client</option>
                <option data-value="Canceled by SC">Canceled by SC</option>
                <option data-value="Canceled by MS">Canceled by MC</option>
            </select>
            </div>
		';

		return $output;
	}