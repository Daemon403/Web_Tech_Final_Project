<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Club</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-3">All Players</h2>
        <ul id="playersList" class="list-group"></ul>
    </div>

    <script>
    // Function to fetch all players from the database
    function getAllPlayers() {
        $.ajax({
            url: '../actions/get_players.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Populate the players list
                var playersList = $('#playersList');
                playersList.empty();
                $.each(data, function(index, player) {
                    var listItem = $('<li>').addClass('list-group-item');
                    // Display player's username and ranking
                    listItem.text(player.username + ' (Ranking: ' + player.ranking + ')');
                    var button = $('<button>').text('Challenge').addClass('btn btn-primary btn-sm float-right');
                    button.on('click', function() {
                        challengePlayer(player.pid);
                    });
                    listItem.append(button);
                    playersList.append(listItem);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching players:', error);
            }
        });
    }

    // Function to challenge a player
    function challengePlayer(challengedId) {
        var currentUserId = 1; // Assuming the current user ID is 1 (you can replace this with the actual user ID)
        
        // Send challenge request to challenge_player.php
        $.ajax({
            url: '../actions/challenge_player.php',
            type: 'POST',
            dataType: 'json',
            data: { challengerId: currentUserId, challengedId: challengedId },
            success: function(response) {
                if (response.success) {
                    alert('Challenge sent successfully!');
                } else {
                    alert('Error: ' + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error challenging player:', error);
            }
        });
    }

    // Load all players when the page loads
    $(document).ready(function() {
        getAllPlayers();
    });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
