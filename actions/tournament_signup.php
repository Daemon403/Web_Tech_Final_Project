<?php
// Establish database connection
include '../settings/connection.php';

// Get form data
$tournamentId = $_POST['tournamentId'];
$memberId = $_SESSION['member_id']; // Assuming member is logged in and session is active


$sql = "INSERT INTO Tournament_Signups (tournament_id, member_id) VALUES ('$tournamentId', '$memberId')";
if ($conn->query($sql) === TRUE) {
    echo "Signed up for tournament successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
