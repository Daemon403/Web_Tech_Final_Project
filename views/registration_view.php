<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Club</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../templates/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Chess Club Sign-Up</h1>
        <form id="registrationForm" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>

            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="telephone">Telephone:</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <p id="message"></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./scripts.js"></script>
    <script>
        function validateForm() {
            var firstName = document.getElementById('firstname').value;
            var lastName = document.getElementById('lastname').value;
            var username = document.getElementById('username').value;
            var telephone = document.getElementById('telephone').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;


            var nameRegex = /\b[A-Za-z]+\b/;
            var usernameRegex = /^[a-zA-Z0-9_-]+$/;
            var telephoneRegex = /^\d{3}-\d{3}-\d{4}$/;
            var emailRegex = /^\S+@\S+\.\S+$/;
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;


            if (!nameRegex.test(firstName)) {
                alert('Please enter a valid first name.');
                return false;
            }
            if (!nameRegex.test(lastName)) {
                alert('Please enter a valid last name.');
                return false;
            }
            if (!usernameRegex.test(username)) {
                alert('Please enter a valid username.');
                return false;
            }
            if (!telephoneRegex.test(telephone)) {
                alert('Please enter a valid telephone number (XXX-XXX-XXXX).');
                return false;
            }
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }
            if (!passwordRegex.test(password)) {
                alert('Please enter a valid password (at least 8 characters, including one uppercase letter, one lowercase letter, one digit, and one special character).');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
