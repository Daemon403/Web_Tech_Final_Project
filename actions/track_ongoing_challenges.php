<?php
include '../settings/connection.php';

$memberId = $_SESSION['member_id'];

$sql = "SELECT c.challenge_id, CONCAT(m.first_name, ' ', m.last_name) AS challenger_name, c.challenge_date 
        FROM Challenges c
        JOIN Members m ON c.challenger_id = m.member_id
        WHERE c.opponent_id = '$memberId' AND c.status IS NULL";
$result = $conn->query($sql);

echo "<h2>Ongoing Challenges:</h2>";
echo "<ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>" . $row['challenger_name'] . " - " . $row['challenge_date'] . "</li>";
}
echo "</ul>";
$conn->close();
?>
