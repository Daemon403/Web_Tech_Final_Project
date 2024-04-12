<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../templates/styles.css" />
    <title>LOGIN</title>
</head>
<body>
    <div class="wrapper">
        <div class="container" style="margin-left:22%">
            <h2>Login</h2>
            <form action="../login/login_user_action.php" method="post" name="login" onsubmit="return validateLoginForm()">
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
            <p>Don't have an account? <a href="registration_view.php">Sign up</a></p>
        </div>
    </div>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 'login_failed') {
        echo "<p style='color: red;'>Login failed. Please check your credentials.</p>";
    }
    ?>

    <script>
       
        function validateLoginForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

        
            var emailRegex = /^\S+@\S+\.\S+$/;

            if (!emailRegex.test(username)) {
                alert('Please enter a valid email address or username.');
                return false;
            }

            return true; 
        }
    </script>
</body>
</html>
