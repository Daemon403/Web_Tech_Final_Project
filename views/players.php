<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Club</title>
    <link rel="stylesheet" type="text/css" href="../templates/styles.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div id="sidebar">
        <h4>Navigation</h4>
        <ul>
            <li><a href="statistics_view.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="players.php"><i class="fas fa-users"></i> Players</a></li>
            <li><a href="challenges.php"><i class="fas fa-trophy"></i> Challenges</a></li>
            <li><a href="display_ranks_views.php"><i class="fas fa-home"></i> Rankings</a></li>
            <li><a href="calendar.php"><i class="fas fa-users"></i> Calender</a></li>
            <li><a href="conversations.php"><i class="fas fa-trophy"></i> Forum</a></li>
            <li><a href="create_forum_post_view.php"><i class="fas fa-users"></i>Discuss</a></li>
            <li><a href="../views/schedule_game_view.php"><i class="fas fa-users"></i> Schedule Game</a></li>
            <li><a href="../actions/view_requests.php"><i class="fas fa-users"></i> Membership Requests</a></li>
        </ul>
</div>
    <div class="container" style="margin-left:22%">
        <h2 class="mt-4 mb-3">All Players</h2>
        <ul id="playersList" class="list-group"></ul>
    </div>

    <script>
  
    function getAllPlayers() {
        $.ajax({
            url: '../actions/get_players.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                
                var playersList = $('#playersList');
                playersList.empty();
                $.each(data, function(index, player) {
                    var listItem = $('<li>').addClass('list-group-item');
                    
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

   
    function challengePlayer(challengedId) {
        var currentUserId = 1; 
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

    $(document).ready(function() {
        getAllPlayers();
    });
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
