<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Challenges</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-3">Challenges</h2>
        <ul id="challengesList" class="list-group"></ul>
    </div>

    <script>
    // Function to fetch challenges for the current player
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

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
