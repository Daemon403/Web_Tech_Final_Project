<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../templates/styles.css" />
    <title>LOGIN</title>
</head>
<body>
    <div class ="wrapper">
    <div class="container">
        <h2>Login</h2>
        <form action="../login/login_user_action.php" method="post" name="login">
            <div class="form-group">
                <label for="username">Username or Email:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="../login/register_view.php">Sign up</a></p>
    </div>
</div>
<?php
    if (isset($_GET['error']) && $_GET['error'] == 'login_failed') {
        echo "<p style='color: red;'>Login failed. Please check your credentials.</p>";
    }
    ?>
</body>
</html>