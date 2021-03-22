<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "kawale";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//$conn_db = mysql_select_db($mysql_db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>