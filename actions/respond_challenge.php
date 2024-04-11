<?php

include '../settings/connection.php';


$challengeId = $_POST['challengeId'];
$response = $_POST['response'];


$sql = "UPDATE Challenges SET status = '$response' WHERE challenge_id = '$challengeId'";
if ($conn->query($sql) === TRUE) {
    echo "Challenge $response successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
