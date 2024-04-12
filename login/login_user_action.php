<?php
session_start();
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] != "POST" || empty($_POST["username"]) || empty($_POST["password"])) {
    header("Location: ../login/login_view.php?error=invalid_request");
    die();
}

$email = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    header("Location: ../error_page.php?error=db_error");
    die();
}

mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    header("Location: ../login/login_view.php?error=user_not_registered");
    die();
}

$user = mysqli_fetch_assoc($result);

if (!password_verify($password, $user['password'])) {
    header("Location: ../login/login_view.php?error=incorrect_password");
    die();
}

session_regenerate_id(true);

$_SESSION['user_id'] = $user['pid'];
$_SESSION['member_id'] = $user['pid'];
$_SESSION['rid'] = $user['rid'];
$_SESSION['valid'] = true;
$_SESSION['timeout'] = time();

header("Location: ../views/conversations.php");
die();
?>
