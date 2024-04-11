<?php
// Establish database connection
include '../settings/connection.php';
$sql = "SELECT * FROM post_images ";
$result = $conn->query($sql);
if ($result){
    echo "URLs FOUND";
}
// include '../settings/connection.php';
// $query = "SELECT * FROM post_images";
// $result = mysqli_query($conn, $query);
while ($row = $result->fetch_assoc()) {
    echo "<div class='col-md-4 mb-3'>";
    if (!empty($row['image_url'])) {
        echo "<img src='" . $row['image_url'] . "' class='img-fluid' alt='Image'>";
    } else {
        echo "<p>No image available</p>";
    }
    echo "</div>";
}
$conn->close();
?>
