<?php
// Establish database connection
include '../settings/connection.php';
check_login();
$memberId = $_SESSION['member_id'];
$sql = "SELECT e.event_name, e.event_date 
        FROM Event_Signups es
        JOIN Events e ON es.event_id = e.event_id
        WHERE es.member_id = '$memberId'";
$result = $conn->query($sql);

echo "<h2>Events Attended:</h2>";
echo "<ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>" . $row['event_name'] . " - " . $row['event_date'] . "</li>";
}
echo "</ul>";

$conn->close();
?>
