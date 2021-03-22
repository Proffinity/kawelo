<?php
include('../DB/database_connectionPDO.php');

session_start();

$query = "UPDATE login_details SET last_activity = NOW() WHERE login_details_ID = '".$_SESSION['login_details_ID']."'";
$statement = $connect->prepare($query);
$statement->execute();