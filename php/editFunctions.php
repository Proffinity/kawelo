<?php

    function getUserDetails($getID, $conn) {
        $output = "";

        $sel_user = "SELECT * FROM users WHERE ID='$getID'";
        $run_user = mysqli_query($conn, $sel_user);
        $row_user = mysqli_fetch_array($run_user);
            $userID = $row_user['userID'];
            $first_name = $row_user['first_name'];
            $last_name = $row_user['last_name'];
            $imageName = $row_user['image_path'];
            $start_date = $row_user['start_date'];
            $userEmail = $row_user['email'];
            $userMobileNo = $row_user['mobile_no'];
            $userAddress = $row_user['home_address'];
            $userHome = $row_user['home_district'];
            $userRole = $row_user['role'];

        $output ='
            <div class="row">
                <div class="col">
                    <label for="ENo">
                        Employee NO
                    </label>
                    <input name="Employee_no" value="'.$userID.'" type="text" class="form-control" id="Employee_no">
                </div>
                <div class="col">
                    <label for="StartDate">
                        Start Date
                    </label>
                    <input type="date" name="date" value="'.$start_date.'" class="form-control" id="StartDate">
                </div>
                <div class="col">
                    <label for="FirstName">
                        First Name
                    </label>
                    <input type="text" name="first_name" value="'.$first_name.'" class="form-control" id="FirstName">
                </div>
                <div class="col">
                    <label for="LastName">
                        Last Name
                    </label>
                    <input type="text" name="last_name" value="'.$last_name.'" class="form-control" id="LastName">
                </div>
                <div class="col">
                    <label  for="CustomFile">Picture...</label><br>
                    <img src="images/'.$imageName.'" class="img-fluid" alt="userImage" height="69" width="85">
                </div>

            </div>

            <div class="row mt-4">
                <div class="col">
                    <label for="CourtName">
                        Email
                    </label>
                    <input name="email" value="'.$userEmail.'" type="email" class="form-control" id="CourtName">
                </div>
                <div class="col">
                    <label for="PhoneNo">
                        Phone NO:
                    </label>
                    <input name="phone_no" type="tel" value="'.$userMobileNo.'" class="form-control" id="PhoneNo">
                </div>
                <div class="col">
                    <label for="District">
                    Home District
                    </label>
                    <input name="district" type="text" value="'.$userHome.'" class="form-control" id="District">
                </div>
                <div class="col">
                    <label for="Role">
                    Role
                    </label>
                    <input name="role" type="text" value="'.$userRole.'" class="form-control" id="Role">
                </div>

            </div>

            <div class="row mt-4">
                <div class="col">
                    <label for="HomeAd">
                        Home Address
                    </label>
                    <input name="home_address" value="'.$userAddress.'" type="text" class="form-control" id="HomeAdd">
                </div>
            </div>
        ';

        return $output;
    }