<?php
// Establish database connection
include '../settings/connection.php';

function displayUserRanks() {
    global $conn;
    
    $query = "SELECT u.username, u.fname, u.lname, MAX(r.ranking) AS ranking
              FROM Users u
              JOIN User_Ranks r ON u.pid = r.user_id
              WHERE (r.user_id, r.date) IN (
                  SELECT user_id, MAX(date) AS max_date
                  FROM User_Ranks
                  GROUP BY user_id
              )
              GROUP BY u.pid
              ORDER BY ranking DESC";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<div class="container">';
        echo '<table class="table">';
        echo '<thead class="thead-dark">';
        echo '<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Ranking</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "<td>" . $row['ranking'] . "</td>";
            echo "</tr>";
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo "No users found.";
    }
}

displayUserRanks();
?>
