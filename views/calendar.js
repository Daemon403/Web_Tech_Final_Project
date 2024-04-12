document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 'auto', 
        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: {
            url: '../actions/get_tournaments.php',
            method: 'POST',
            extraParams: function() {
                return {
                    custom_param: 'anything'
                };
            },
            failure: function() {
                alert('There was an error fetching events!');
            }
        },
        eventClick: function(info) {
            alert('Tournament ID: ' + info.event.id);
        }
    });
    calendar.render();
});
