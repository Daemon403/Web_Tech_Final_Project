<?php

include '../settings/connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $challengeId = $_POST['challengeId'];

    
    $updateQuery = "UPDATE Challenges SET challenge_status = 'rejected' WHERE cid = '$challengeId'";
    if (mysqli_query($conn, $updateQuery)) {
        echo json_encode(array('success' => true, 'message' => 'Challenge rejected successfully.'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error rejecting challenge.'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request method.'));
}
?>
