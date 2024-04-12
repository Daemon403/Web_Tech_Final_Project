<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Player Rankings</title>
    <link rel="stylesheet" type="text/css" href="../templates/styles.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            <li><a href="players.php"><i class="fas fa-users"></i> Players</a></li>
        </ul>
</div>
    <div class="container" style="margin-left:22%">
        <h2>Update Player Rankings</h2>
        <form action="../actions/update_ranking.php" method="post">
            <div class="form-group">
                <label for="player1_id">Player 1 ID:</label>
                <input type="number" class="form-control" id="player1_id" name="player1_id" required>
            </div>
            <div class="form-group">
                <label for="player2_id">Player 2 ID:</label>
                <input type="number" class="form-control" id="player2_id" name="player2_id" required>
            </div>
            <div class="form-group">
                <label for="result">Result:</label>
                <select class="form-control" id="result" name="result" required>
                    <option value="win">Win</option>
                    <option value="loss">Loss</option>
                    <option value="draw">Draw</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Rankings</button>
        </form>
    </div>
</body>
</html>
