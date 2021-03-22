<?php
//database Connection Using PDO

$connect = new PDO("mysql:host=localhost;dbname=kawale;charset=utf8mb4;", "root", "123456");

function fetch_user_last_activity($userID, $connect) {
    $query = "SELECT * FROM login_details WHERE userID = '$userID' ORDER BY last_activity DESC LIMIT 1";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        return $row['last_activity'];
    }
}

function fetch_user_chat_history($from_user_ID, $to_user_ID, $connect)
{
    $query = "SELECT * FROM chat_message WHERE (from_user_ID = '".$from_user_ID."' AND to_user_ID = '".$to_user_ID."') OR (from_user_ID = '".$to_user_ID."' AND to_user_ID = '".$from_user_ID."') ORDER BY timestamp DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '<div class="chat-messages p-4">';
    foreach($result as $row)
    {
        $user_name = '';
        if ($row['from_user_ID'] == $from_user_ID) {
            $user_name = "You";
        } else {
            $user_name = get_user_name($row['from_user_ID'], $connect);
        }
        $output .= '
            <div class="chat-message-right pb-4">
                <div>
                    <img src="assets/images/users/user-1.jpg" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                    <div class="text-muted small text-nowrap mt-2">'.$row['timestamp'].'</div>
                </div>
                <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                    <div class="font-weight-bold mb-1">'.$user_name.'</div>
                    '.$row['chat_message'].'
                </div>
            </div>
        ';  
    }
    $output .= '</div>';
    $query = "UPDATE chat_message SET status = '0' WHERE from_user_ID = '".$to_user_ID."' AND to_user_ID = '".$from_user_ID."' AND status = '1'";
    $statement = $connect->prepare($query);
    $statement->execute();

    return $output;
}

function get_user_name($userID, $connect)
{
    $query = "SELECT first_name FROM users WHERE ID = '$userID'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        return $row['first_name'];
    }
}

function count_unseen_message($from_user_ID, $to_user_ID, $connect)
{
    $query = "SELECT * FROM chat_message WHERE from_user_ID = '$from_user_ID' AND to_user_ID = '$to_user_ID' AND status = '1'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $count = $statement->rowCount();
    $output = '';

    if($count > 0)
    {
        $output = '<div class="badge bg-success float-right">'.$count.'</div>';
    }
    return $output;
}

function fetch_is_type_status($userID, $connect)
{
    $query = "SELECT is_type FROM login_details WHERE userID = '".$userID."' ORDER BY last_activity DESC LIMIT 1";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';

    foreach($result as $row)
    {
        if($row["is_type"] == 'yes')
        {
            $output = 'Typing...';
        }
    }
    return $output;

}

?>