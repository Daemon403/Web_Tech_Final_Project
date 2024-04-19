<!DOCTYPE html>
<html>

<head>
    <title>RANKINGS</title>
    <link rel="stylesheet" type="text/css" href="../templates/styles.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
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
<body>
    <div id="container" style="margin-left:22%">
    <?php include '../actions/display_ranks.php'; ?>
    </div>
</body>

</html>
