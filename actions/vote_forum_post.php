<?php
include '../settings/connection.php';

$postId = $_POST['postId'];
$memberId = $_SESSION['member_id'];
$voteType = $_POST['vote'];


$sqlCheck = "SELECT COUNT(*) AS count FROM Post_Votes WHERE post_id = '$postId' AND member_id = '$memberId'";
$resultCheck = $conn->query($sqlCheck);
$rowCheck = $resultCheck->fetch_assoc();
if ($rowCheck['count'] > 0) {
    echo "You have already voted on this post";
} else {

    $sql = "INSERT INTO Post_Votes (post_id, member_id, vote_type) 
            VALUES ('$postId', '$memberId', '$voteType')";
    if ($conn->query($sql) === TRUE) {
        echo "Vote recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
