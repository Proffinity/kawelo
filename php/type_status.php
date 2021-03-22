<?php

include('../DB/database_connectionPDO.php');
session_start();

$query = "SELECT * FROM users WHERE userID != '".$_SESSION['userID']."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';

foreach($result as $row)
{
    $output = fetch_is_type_status($row['ID'], $connect);
    echo $output;
}

