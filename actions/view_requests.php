<?php
include '../settings/connection.php';

function viewAndApproveMembershipRequests() {
    global $conn;
    
    $query = "SELECT m.mid, u.username, u.fname, u.lname, u.email
              FROM Membership m
              JOIN Users u ON m.user_id = u.pid
              WHERE m.membership_status = 'pending'";
    
    $result = mysqli_query($conn, $query);

    echo "<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>";
    echo "<style>";
    echo "table:hover { background-color: #f5f5f5; }";
    echo "td, th { padding: 8px; text-align: left; }";
    echo "tr:hover { background-color: #e9ecef; }";
    echo "</style>";

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<div class='container mt-3'>";
        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-light'>";
        echo "<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td><a href='approval.php?mid=" . $row['mid'] . "' class='btn btn-success'>Approve</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>No pending membership requests found.</div>";
    }
}

viewAndApproveMembershipRequests();
?>
