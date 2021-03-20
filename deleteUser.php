<?php
session_start();

//If condition for Checking if User is Logged in
if (!isset($_SESSION['userID'])) {
    echo "<script>alert('Please Login')</script>";
    echo "<script>window.open('login.php','_self')</script>";
} else {
$userID = $_SESSION['userID'];
require 'DB/connect.inc.php';

if (isset($_GET['ID'])) {
    $user_ID = $_GET['ID'];

    $delete_user = "DELETE FROM users WHERE userID='$user_ID'";
    $run_user = mysqli_query($conn, $delete_user);

    header('location:users.php');
}

}