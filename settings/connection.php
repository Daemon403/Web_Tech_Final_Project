<?php
// Establish connection to your database
// $host = "sql203.infinityfree.com";
// $username = "if0_36300745";
// $password = "Pw1I8bELFh";
// $dbname = "if0_36300745_tasks";
$host = "localhost";
$username = "root";
$password = "cicada3307";
$dbname = "chessitems";


$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>