<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tournaments</title>

    <link rel="stylesheet" type="text/css" href="../templates/styles.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            <li><a href="players.php"><i class="fas fa-users"></i> Players</a></li>
        </ul>
</div>
    <div class="container" style="margin-left:22%">
        <h2>Create New Tournament</h2>
        <form id="createTournamentForm">
            <div class="form-group">
                <label for="name">Tournament Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="endDate">End Date:</label>
                <input type="date" id="endDate" name="endDate" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="format">Format:</label>
                <select id="format" name="format" class="form-control" required>
                    <option value="round-robin">Round Robin</option>
                    <option value="swiss">Swiss</option>
                    <option value="knockout">Knockout</option>
                </select>
            </div>
            <button type="submit" name="create" class="btn btn-primary">Create Tournament</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {

        $('#createTournamentForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '../actions/create_tournament.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert('Tournament created successfully!');
                    } else {
                        alert('Failed to create tournament. Error: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error creating tournament:', error);
                }
            });
        });
    });
    </script>
</body>
</html>
