<?php
// Establish database connection
include '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $player1_id = $_POST['player1_id'];
    $player2_id = $_POST['player2_id'];
    $result = $_POST['result'];
    updateRankings($player1_id, $player2_id, $result);

    exit();
} else {
    
    header("Location: error.php");
    exit();
}
function updateRankings($player1_id, $player2_id, $result) {
    global $conn;
    $win_points = 1;
    $loss_points = 0;
    $draw_points = 0.5;

    // Determine points for each player based on the result
    $player1_points = $result === 'win' ? $win_points : ($result === 'loss' ? $loss_points : $draw_points);
    $player2_points = $result === 'win' ? $loss_points : ($result === 'loss' ? $win_points : $draw_points);

    // Get current rankings
    $query1 = "SELECT ranking FROM User_Ranks WHERE user_id = $player1_id";
    $query2 = "SELECT ranking FROM User_Ranks WHERE user_id = $player2_id";

    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);

    if ($result1 && $result2) {
        $row1 = mysqli_fetch_assoc($result1);
        $row2 = mysqli_fetch_assoc($result2);

        //new rankings
        $new_ranking1 = $row1['ranking'] + $player1_points;
        $new_ranking2 = $row2['ranking'] + $player2_points;

        // Insert rankings
        $insert_query1 = "INSERT INTO User_Ranks (user_id, ranking, date) VALUES ($player1_id, $new_ranking1, NOW())";
        $insert_query2 = "INSERT INTO User_Ranks (user_id, ranking, date) VALUES ($player2_id, $new_ranking2, NOW())";

        if (mysqli_query($conn, $insert_query1) && mysqli_query($conn, $insert_query2)) {
            echo "Rankings updated successfully.";
        } else {
            echo "Error updating rankings: " . mysqli_error($conn);
        }
    } else {
        echo "Error fetching current rankings: " . mysqli_error($conn);
    }
}





?>
