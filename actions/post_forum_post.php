<?php

include '../settings/connection.php';

// $memberId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$memberId = 1;
$caption = mysqli_real_escape_string($conn, $_POST['caption']);

$targetDir = "../uploads/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
$imageUrl = $targetFile;


if ($memberId && $caption && $imageUrl) {
    $sql = "INSERT INTO Forum_Posts (author_id, post_content, image) VALUES ('$memberId', '$caption', '$imageUrl')";
    if ($conn->query($sql) === TRUE) {
        echo "Post submitted successfully" ;
        header("Location: ../views/v.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
