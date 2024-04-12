<?php
session_start();
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["username"]) && !empty($_POST["password"])) {
    $email = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['pid'];
                $_SESSION['member_id'] = $user['pid'];
                $_SESSION['rid'] = $user['rid'];
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();

                header("Location: ../index.php");
                exit();
            } else {
                $error = "Incorrect password";
            }
        } else {
            $error = "User not registered";
        }
    } else {
        $error = "Database error";
    }

    header("Location: ../login_user.php?error=" . urlencode($error));
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
