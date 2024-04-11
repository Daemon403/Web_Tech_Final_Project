<?php
include '../settings/connection.php';


function getSummaries(){
    global $conn;

    $tournaments = [];
    $tournamentQuery = "SELECT tournament_name, start_date, end_date FROM Tournaments ORDER BY start_date DESC LIMIT 5";
    $tournamentResult = $conn->query($tournamentQuery);
    if ($tournamentResult->num_rows > 0) {
        while($row = $tournamentResult->fetch_assoc()) {
            $tournaments[] = $row;
        }
    }

    $events = [];
    $eventQuery = "SELECT event_name, event_date FROM Events WHERE event_date > CURDATE() ORDER BY event_date ASC LIMIT 5";
    $eventResult = $conn->query($eventQuery);
    if ($eventResult->num_rows > 0) {
        while($row = $eventResult->fetch_assoc()) {
            $events[] = $row;
        }
    }

    $rankings = [];
    $rankingQuery = "SELECT p.fname, p.lname, r.ranking FROM People p INNER JOIN Rankings r ON p.pid = r.member_id ORDER BY r.ranking ASC LIMIT 5";
    $rankingResult = $conn->query($rankingQuery);
    if ($rankingResult->num_rows > 0) {
        while($row = $rankingResult->fetch_assoc()) {
            $rankings[] = $row;
        }
    }
    $conn->close();

    return [
        'tournaments' => $tournaments,
        'events' => $events,
        'rankings' => $rankings
    ];
}
?>
