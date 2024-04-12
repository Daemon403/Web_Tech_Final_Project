<?php
include '../settings/connection.php';
include '../settings/core.php';

if (check_admin()){
    if (isset($_GET['mid'])) {
        $membership_id = $_GET['mid'];
        $update_query = "UPDATE Membership SET membership_status = 'approved' WHERE mid = $membership_id";
        mysqli_query($conn, $update_query);
    
        $user_query = "SELECT user_id FROM Membership WHERE mid = $membership_id";
        $result = mysqli_query($conn, $user_query);
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
    
        $insert_query = "INSERT INTO User_Ranks (user_id, ranking, date) VALUES ($user_id, 20, NOW())";
        mysqli_query($conn, $insert_query);
    
        header("Location: ../actions/view_requests.php");
        exit();
    } else {
        header("Location: error.php");
        exit();
    }
}

?>
