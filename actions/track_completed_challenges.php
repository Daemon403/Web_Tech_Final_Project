<?php

include '../settings/connection.php';


$memberId = $_SESSION['member_id']; 

$sql = "SELECT c.challenge_id, CONCAT(m.first_name, ' ', m.last_name) AS challenger_name, c.challenge_date, c.status 
        FROM Challenges c
        JOIN Members m ON c.challenger_id = m.member_id
        WHERE (c.opponent_id = '$memberId' OR c.challenger_id = '$memberId') AND c.status IS NOT NULL";
$result = $conn->query($sql);

echo "<h2>Completed Challenges:</h2>";
echo "<ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>" . $row['challenger_name'] . " - " . $row['challenge_date'] . " - Status: " . $row['status'] . "</li>";
}
echo "</ul>";


$conn->close();
?>
