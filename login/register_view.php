<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css"/>
    <title>REGISTER</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h2>Sign Up</h2>
            <form id="signupForm" action="../action/register_user.php" method="post">
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" placeholder="Enter your first name" required>
                </div>
                
                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" placeholder="Enter your last name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>

                <div class="form-group">
                    <label for="tel">tel Number:</label>
                    <input type="text" id="tel" name="tel" placeholder="Enter your tel number" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <label for="family">Family Name:</label>
                    <select id="family" name="family" required>
                        <option value="1">Father</option>
                        <option value="2">Mother</option>
                        <option value="3">Son</option>
                        <option value="4">Daughter</option>
                        <option value="5">Sister</option>
                        <option value="6">Brother</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <input type="text" id="gender" name="gender" placeholder ="Gender" required>
                </div>
                <button type="submit">Submit</button>
            </form>
            <p>Already have an account? <a href="login_view.php">Sign in</a></p>
        </div>
    </div>

    <script>
        const form = document.getElementById('signupForm');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const isValid = validateForm();

            if (isValid) {
                this.submit();
            }
        });

        function validateForm() {
            const fname = document.getElementById('fname').value.trim();
            const lname = document.getElementById('lname').value.trim();
            const tel = document.getElementById('tel').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!fname) {
                alert('Please enter your first name.');
                return false;
            }

            if (!lname) {
                alert('Please enter your last name.');
                return false;
            }

            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }

            if (tel.length !== 10 || !/^\d+$/.test(tel)) {
                alert('Please enter a valid 10-digit tel number.');
                return false;
            }

            if (password.length < 8) {
                alert('Password must be at least 8 characters long.');
                return false;
            }

            if (password !== confirmPassword) {
                alert('Password and Confirm Password must match.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
