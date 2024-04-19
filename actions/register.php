<?php
include '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Users (fname, lname, username, email, password, rid) VALUES (?, ?, ?, ?, ?, 1)";
    
  
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $firstname, $lastname, $username, $email, $hashed_password);



   
    if ($stmt->execute()) {
        $user_id = $stmt->insert_id;
        $sql2 = "INSERT INTO membership (user_id, membership_status) VALUES (?, 'pending')";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $user_id);

        if ($stmt2->execute()) {
            echo "User registered successfully and membership pending.";
        } else {
            echo "Error in membership registration: " . $stmt2->error;
        }
        $stmt2->close();

    } else {

        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
