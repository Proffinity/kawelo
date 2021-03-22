<?php

include('../DB/database_connectionPDO.php');
session_start();

$query = "UPDATE login_details SET is_type = '".$_POST["is_type"]."' WHERE login_details_ID = '".$_SESSION["login_details_ID"]."'";
$statement = $connect->prepare($query);
$statement->execute();

