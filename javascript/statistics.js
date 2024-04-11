$(document).ready(function() {
    // Fetch game statistics from the server
    $.ajax({
        url: '../actions/statistics.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Update the HTML with the received game statistics
            $('#totalGames').text('Total Games: ' + data.total_games);
            $('#wins').text('Wins: ' + data.wins);
            $('#losses').text('Losses: ' + data.losses);
            $('#draws').text('Draws: ' + data.draws);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching game statistics:', error);
        }
    });
});
