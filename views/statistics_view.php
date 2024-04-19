<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Statistics</title>
    <link rel="stylesheet" type="text/css" href="../templates/styles.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        #statisticsContainer {
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .card {
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .card p {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.4);
        }
        #totalGames {
            background-color: #ffc107;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        #totalGames:hover {
            background-color: #ffb400;
        }
        #wins {
            background-color: #28a745;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        #wins:hover {
            background-color: #218838;
        }
        #losses {
            background-color: #dc3545;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        #losses:hover {
            background-color: #c82333;
        }
        #draws {
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        #draws:hover {
            background-color: #0056b3;
        }
    </style>
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
    <div class="container" id="statisticsContainer" style="margin:22%">
        <h2>Game Statistics:</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <p id="totalGames">Total Games:</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <p id="wins">Wins:</p>
                </div>
            </div>
            <div></div>
            <div class="col-md-3">
                <div class="card">
                    <p id="losses">Losses:</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <p id="draws">Draws:</p>
                </div>
            </div>
        </div>
        <?php include '../actions/display_ranks.php'; ?>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../javascript/statistics.js"></script>
</body>
</html>
