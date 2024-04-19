<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Challenges</title>
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
        <h2 class="mt-4 mb-3">Challenges</h2>
        <ul id="challengesList" class="list-group"></ul>
    </div>

    <script>
    
    function getChallenges() {
        $.ajax({
            url: '../actions/get_challenges.php',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    displayChallenges(response.challenges);
                } else {
                    console.error('Error fetching challenges:', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching challenges:', error);
            }
        });
    }

    function displayChallenges(challenges) {
        var challengesList = $('#challengesList');
        challengesList.empty();
        $.each(challenges, function(index, challenge) {
            var listItem = $('<li>').addClass('list-group-item');
            var listItemText = $('<div>').text('Challenge from ' + challenge.challenger_username).addClass('text-dark');
            var buttonGroup = $('<div>').addClass('btn-group ml-auto');
            var acceptButton = $('<button>').text('Accept').addClass('btn btn-success').click(function() {
                acceptChallenge(challenge.cid);
            });
            var rejectButton = $('<button>').text('Reject').addClass('btn btn-danger').click(function() {
                rejectChallenge(challenge.cid);
            });
            buttonGroup.append(acceptButton, rejectButton);
            listItem.append(listItemText, buttonGroup);
            challengesList.append(listItem);
        });
    }

    function acceptChallenge(challengeId) {
    $.ajax({
        url: '../actions/accept.php',
        type: 'POST',
        dataType: 'json',
        data: { challengeId: challengeId },
        success: function(response) {
            if (response.success) {
                alert(response.message);
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error accepting challenge:', error);
        }
    });
}

function rejectChallenge(challengeId) {
    $.ajax({
        url: '../actions/reject.php',
        type: 'POST',
        dataType: 'json',
        data: { challengeId: challengeId },
        success: function(response) {
            if (response.success) {
                alert(response.message);
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error rejecting challenge:', error);
        }
    });
}

    $(document).ready(function() {
        getChallenges();
    });
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
