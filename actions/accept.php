<?php
// Establish database connection
include '../settings/connection.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get challenge ID from the POST data
    $challengeId = $_POST['challengeId'];

    // Update challenge status to 'accepted' in the database
    $updateQuery = "UPDATE Challenges SET challenge_status = 'accepted' WHERE cid = '$challengeId'";
    if (mysqli_query($conn, $updateQuery)) {
        echo json_encode(array('success' => true, 'message' => 'Challenge accepted successfully.'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error accepting challenge.'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request method.'));
}
?>
