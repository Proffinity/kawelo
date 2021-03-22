<?php
include('../DB/database_connectionPDO.php');
session_start();

$data = array(
    ':to_user_ID'     =>    $_POST['to_user_ID'],
    ':from_user_ID'   =>    $_SESSION['user_ID'],
    ':chat_message'   =>    $_POST['chat_message'],
    ':status'         =>    '1'
);

$query = "INSERT INTO chat_message(to_user_ID, from_user_ID, chat_message, status) VALUES(:to_user_ID, :from_user_ID, :chat_message, :status)";
$statement = $connect->prepare($query);

if($statement->execute($data))
{
    echo fetch_user_chat_history($_SESSION['user_ID'], $_POST['to_user_ID'], $connect);
}