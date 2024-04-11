<?php
// Establish database connection
include '../settings/connection.php';
//&& $_SESSION['user_role'] == 'admin')
// Check if membership ID is provided and if the user is logged in as an admin (you may need to adjust this based on your authentication system)
if (isset($_GET['mid'])) {
    $membership_id = $_GET['mid'];

    // Update membership status to 'approved'
    $update_query = "UPDATE Membership SET membership_status = 'approved' WHERE mid = $membership_id";
    mysqli_query($conn, $update_query);

    // Insert the user into the rankings table with a default ranking of 20
    $user_query = "SELECT user_id FROM Membership WHERE mid = $membership_id";
    $result = mysqli_query($conn, $user_query);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];

    $insert_query = "INSERT INTO User_Ranks (user_id, ranking, date) VALUES ($user_id, 20, NOW())";
    mysqli_query($conn, $insert_query);

    // Redirect back to the membership requests page or any other appropriate page
    header("Location: ../actions/view_requests.php");
    exit();
} else {
    // Redirect to an error page or login page if the user is not authorized or if the membership ID is not provided
    header("Location: error.php");
    exit();
}
?>
