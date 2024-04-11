<?php
// Establish database connection
include '../settings/connection.php';

function viewAndApproveMembershipRequests() {
    global $conn;
    
    // SQL query to select pending membership requests
    $query = "SELECT m.mid, u.username, u.fname, u.lname, u.email
              FROM Membership m
              JOIN Users u ON m.user_id = u.pid
              WHERE m.membership_status = 'pending'";
    
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td><a href='approval.php?mid=" . $row['mid'] . "'>Approve</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No pending membership requests found.";
    }
}

// Call the function to view and approve membership requests
viewAndApproveMembershipRequests();
?>
