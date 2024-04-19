<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../templates/styles.css" /> -->
    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Login</h2>
                        <form action="../login/login_user_action.php" method="post" name="login" onsubmit="return validateLoginForm()">
                            <div class="form-group">
                                <label for="username">Username or Email:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <p class="text-center mt-3">Don't have an account? <a href="registration_view.php">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['error']) && $_GET['error'] == 'login_failed') {
        echo "<p style='color: red;' class='text-center mt-3'>Login failed. Please check your credentials.</p>";
    }
    ?>

    <script>
        function validateLoginForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            return true;
        }
    </script>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
