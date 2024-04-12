$(document).ready(function() {
    $('#registrationForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../actions/register.php',
            data: formData,
            success: function(response) {
                $('#message').text(response);
                $('#registrationForm')[0].reset();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});