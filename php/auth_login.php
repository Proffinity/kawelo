<?php

function Login($userID, $password, $conn) {
    //Query for Validating if User Exists
    $sel_user = "SELECT * FROM users WHERE userID='$userID' AND password='$password'";
    $run_user = mysqli_query($conn, $sel_user);
    $check_user = mysqli_num_rows($run_user);

    if ($check_user==0) {
        $output = "<script>alert('Either your Email Address or Password is Wrong!')</script>";
    } else {
        $sel_userID = "SELECT * FROM users WHERE userID='$userID'";
        $run_userID = mysqli_query($conn, $sel_userID);
        $row_userID = mysqli_fetch_array($run_userID);
            $ID = $row_userID['ID'];
            $firstName = $row_userID['first_name'];
            $lastName = $row_userID['last_name'];

        $date = date('Y-m-d');
        $time = strtotime(date('H:i:s') . '+1 hour');
        $time = date('H:i:s', $time);
            
        $insert_logs = "INSERT INTO logs(first_name,last_name,date,log_in_time) VALUES('$firstName','$lastName','$date','$time')";
        $run_logs = mysqli_query($conn, $insert_logs);
        $_SESSION['user_logID'] = mysqli_insert_id($conn);

        $insert_log = "INSERT INTO login_details(userID) VALUES('$ID')";
        $run_log = mysqli_query($conn, $insert_log);
        $_SESSION['login_details_ID'] = mysqli_insert_id($conn);

        $_SESSION['userID']=$userID;
        $_SESSION['user_ID']=$ID;
        $output = "<script>alert('Your Loggen in succesfully!')</script>";
        $output .= "<script>window.open('index.php','_self')</script>";
    }
    return $output;
}
?>