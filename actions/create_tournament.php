<?php
include '../settings/connection.php';

function createTournament($name, $startDate, $endDate, $format, $creatorId) {
    global $conn;
    $query = "INSERT INTO Tournaments (tournament_name, start_date, end_date, format, creator_id) 
              VALUES ('$name', '$startDate', '$endDate', '$format', $creatorId)";
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}

function updateTournament($id, $name, $startDate, $endDate, $format) {
    global $conn;
    $query = "UPDATE Tournaments 
              SET tournament_name='$name', start_date='$startDate', end_date='$endDate', format='$format' 
              WHERE tournament_id=$id";
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false; 
    }
}

function deleteTournament($id) {
    global $conn;
    $query = "DELETE FROM Tournaments WHERE tournament_id=$id";
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}

function assignPlayersToTournament($tournamentId, $playerIds) {
    global $conn;
    foreach ($playerIds as $playerId) {
        $query = "INSERT INTO Tournament_Participants (tournament_id, user_id) 
                  VALUES ($tournamentId, $playerId)";
        mysqli_query($conn, $query);
    }
}

function getTournamentDetails($id) {
    global $conn;
    $query = "SELECT * FROM Tournaments WHERE tournament_id=$id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $format = $_POST['format'];
        $creatorId = 1; 
        
        if (createTournament($name, $startDate, $endDate, $format, $creatorId)) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'error' => 'Failed to create tournament.'));
        }
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $format = $_POST['format'];

        if (updateTournament($id, $name, $startDate, $endDate, $format)) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'error' => 'Failed to update tournament.'));
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];

        if (deleteTournament($id)) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'error' => 'Failed to delete tournament.'));
        }
    }
}
?>
