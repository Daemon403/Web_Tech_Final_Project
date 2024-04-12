<?php

include '../settings/connection.php';

$query = "SELECT u.pid, u.username, r.ranking
FROM Users u
LEFT JOIN (
    SELECT user_id, MAX(date) AS max_date
    FROM User_Ranks
    GROUP BY user_id
) latest_rank ON u.pid = latest_rank.user_id
LEFT JOIN User_Ranks r ON latest_rank.user_id = r.user_id AND latest_rank.max_date = r.date";

$result = mysqli_query($conn, $query);

$players = array();
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $players[$row['pid']] = $row; 
    }
}
header('Content-Type: application/json');
echo json_encode(array_values($players)); 
?>
