<?php
include '../settings/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['gender'];
    $dob = $_POST['dob'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $password = $_POST['password'];



    $sql = "INSERT INTO Users (fname, lname,username,email,password,rid) VALUES ('$firstname', '$lastname','$username','$email','$password',1)";
    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
