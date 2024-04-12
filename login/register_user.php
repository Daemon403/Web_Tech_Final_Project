<?php
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming $rid is defined elsewhere or you can assign the role ID directly
    $rid = 3;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username']; // Assuming this is the username field
    $dob = $_POST['dob'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query with placeholders
    $query = "INSERT INTO Users (rid, fname, lname, username, email, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "isssss", $rid, $firstname, $lastname, $username, $email, $hashed_password);
        
        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Redirect with success message
            header("Location: ../login/login_view.php?registration_successful");
            exit();
        } else {
            // Handle the error
            die(mysqli_error($conn));
        }
    } else {
        // Handle the error
        die(mysqli_error($conn));
    }
}
?>
