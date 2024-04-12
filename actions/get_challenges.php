<?php

include '../settings/connection.php';
check_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $currentPlayerId = 2;

    
    $query = "SELECT c.cid, u.username AS challenger_username
              FROM Challenges c
              INNER JOIN Users u ON c.challenger_id = u.pid
              WHERE c.challenged_id = '$currentPlayerId' AND c.challenge_status = 'pending'";
    $result = mysqli_query($conn, $query);

    
    if ($result && mysqli_num_rows($result) > 0) {
        $challenges = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $challenges[] = $row;
        }
        echo json_encode(array('success' => true, 'challenges' => $challenges));
    } else {
        echo json_encode(array('success' => false, 'message' => 'No challenges found.'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request method.'));
}
?>
