<?php
include('../DB/database_connectionPDO.php');
session_start();

$query = "SELECT * FROM users WHERE userID != '".$_SESSION['userID']."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row) 
{
    $status = '';
    $current_timestamp = strtotime(date('Y-m-d H:i:s') . '+59 minute 50 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
    $user_last_activity = fetch_user_last_activity($row['ID'], $connect);
    if ($user_last_activity > $current_timestamp) {
        $status = '<div class="small"><span class="fas fa-circle chat-online"></span> Online</div>';
    } else {
        $status = '<div class="small"><span class="fas fa-circle chat-online"></span> Offline</div>';
    }
    
    $output = '
        <a href="#" data-touserid="'.$row['ID'].'" data-tousername="'.$row['first_name'].'" class="list-group-item start_chat list-group-item-action border-0">
            '.count_unseen_message($row['ID'], $_SESSION['user_ID'], $connect).'
            <div class="d-flex align-items-start">
                <img src="assets/images/users/user-1.jpg" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                <div class="flex-grow-1 ml-3">
                    '.$row['first_name'].'
                    '.$status.'
                </div>
            </div>
        </a>
    ';
    echo $output;
}


