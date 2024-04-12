<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../templates/styles.css" />
    <title>Schedule Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        select, button {
            margin-bottom: 20px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
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
            <li><a href="players.php"><i class="fas fa-users"></i> Players</a></li>
        </ul>
</div>
    
    <div class="container" id="scheduleGameContainer" style="margin-left:22%">
        <h2>Schedule a Game:</h2>
        <form id="scheduleGameForm" method="post" action="../actions/schedule_game.php">
            <select name="player1Id" required>
                <?php
                include '../settings/connection.php';
                $sql = "SELECT pid, fname, lname FROM users";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['pid'] . "'>" . $row['fname'] . " " . $row['lname'] . "</option>";
                }
                ?>
            </select>
            <select name="player2Id" required>
                <?php
                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['pid'] . "'>" . $row['fname'] . " " . $row['lname'] . "</option>";
                }
                ?>
            </select>
            <button type="submit">Schedule Game</button>
        </form>
    </div>
</body>
</html>
