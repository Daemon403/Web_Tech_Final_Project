<?php
// Establish database connection
include '../settings/connection.php';

// Get form data
$eventName = $_POST['eventName'];
$eventDate = $_POST['eventDate'];
$invitationOnly = isset($_POST['invitationOnly']) ? 1 : 0;
// Additional fields can be retrieved similarly

// Insert event into database
$sql = "INSERT INTO Events (event_name, event_date, invitation_only) 
        VALUES ('$eventName', '$eventDate', '$invitationOnly')";
if ($conn->query($sql) === TRUE) {
    echo "Event created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
