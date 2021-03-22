<?php
include('../DB/database_connectionPDO.php');
session_start();

echo fetch_user_chat_history($_SESSION['user_ID'], $_POST['to_user_ID'], $connect);

//echo("{$_SESSION['userID']}");

//print_r($_POST['to_user_ID']);