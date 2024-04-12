<?php

include '../settings/connection.php';
include '../settings/core.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $challengeId = $_POST['challengeId'];

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
