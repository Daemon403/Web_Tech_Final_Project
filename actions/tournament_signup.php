<?php
include '../settings/connection.php';
check_login();

$tournamentId = $_POST['tournamentId'];
$memberId = $_SESSION['member_id']; 


$sql = "INSERT INTO Tournament_Signups (tournament_id, member_id) VALUES ('$tournamentId', '$memberId')";
if ($conn->query($sql) === TRUE) {
    echo "Signed up for tournament successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
