<?php

include '../settings/connection.php';

$player1Id = $_POST['player1Id'];
$player2Id = $_POST['player2Id'];

if ($player1Id !=$player2Id){
    $sql = "INSERT INTO Games (player1_id, player2_id) VALUES ('$player1Id', '$player2Id')";
    if ($conn->query($sql) === TRUE) {
        echo "Game scheduled successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    echo "Error creating a game";
    header("Location: ../views/schedule_game_view.php");
}

$conn->close();
?>
