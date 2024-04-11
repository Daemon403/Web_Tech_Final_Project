<?php

include '../settings/connection.php';


$query = "SELECT tournament_id AS id, tournament_name AS title, start_date AS start, end_date AS end FROM Tournaments";
$result = mysqli_query($conn, $query);


$events = array();


while ($row = mysqli_fetch_assoc($result)) {
    $events[] = $row;
}

header('Content-Type: application/json');
echo json_encode($events);
?>
