<?php

include '../settings/connection.php';


// $memberId = $_SESSION['member_id']; 
$memberId =2;

$sql = "SELECT COUNT(*) AS total_games,
               SUM(CASE WHEN result = 'win' THEN 1 ELSE 0 END) AS wins,
               SUM(CASE WHEN result = 'loss' THEN 1 ELSE 0 END) AS losses,
               SUM(CASE WHEN result = 'draw' THEN 1 ELSE 0 END) AS draws
        FROM Games
        WHERE player1_id = '$memberId' OR player2_id = '$memberId'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


echo "<h2>Game Statistics:</h2>";
echo "<p>Total Games: " . $row['total_games'] . "</p>";
echo "<p>Wins: " . $row['wins'] . "</p>";
echo "<p>Losses: " . $row['losses'] . "</p>";
echo "<p>Draws: " . $row['draws'] . "</p>";


$conn->close();
?>
