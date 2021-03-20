<?php
session_start();
require 'DB/connect.inc.php';

$logID = $_SESSION['user_logID'];

    //$date = date('Y-m-d');
    $time = strtotime(date('H:i:s') . '+1 hour');
    $time = date('H:i:s', $time);

$update_logs = "UPDATE logs set log_out_time='$time' WHERE ID='$logID'";
$run_logs = mysqli_query($conn, $update_logs);


session_destroy();

echo "<script>window.open('login.php','_self')</script>";
?>