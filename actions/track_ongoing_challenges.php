<?php
include '../settings/connection.php';

// Get member ID
$memberId = $_SESSION['member_id']; // Assuming member is logged in and session is active

// Retrieve ongoing challenges involving the member
$sql = "SELECT c.challenge_id, CONCAT(m.first_name, ' ', m.last_name) AS challenger_name, c.challenge_date 
        FROM Challenges c
        JOIN Members m ON c.challenger_id = m.member_id
        WHERE c.opponent_id = '$memberId' AND c.status IS NULL";
$result = $conn->query($sql);

// Display ongoing challenges
echo "<h2>Ongoing Challenges:</h2>";
echo "<ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>" . $row['challenger_name'] . " - " . $row['challenge_date'] . "</li>";
}
echo "</ul>";

// Close database connection
$conn->close();
?>
