<?php
// Assuming session_start() is used on the pages where needed
session_start();
$error = "";

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // Fetching user inputs
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    // Normally, you'd validate user credentials with a database
    // Simulating a check (replace this with actual database logic)
    if ($email == 'user@example.com' && $password == 'password123') {
        $_SESSION['user'] = $email;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}

// Handle signup form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    // Fetching user inputs
    $name = $_POST['signup_name'];
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];

    // In a real application, insert the user data into a database and perform validation
    // Simulating success (replace this with actual database logic)
    $error = "Signup successful! Please log in.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <div class="login-signup-form">
            <div class="tabs">
                <button class="tab-btn" id="loginTab">Login</button>
                <button class="tab-btn" id="signupTab">Signup</button>
            </div>

            <div class="form-container">
                <!-- Display error if exists -->
                <?php if ($error): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>

                <!-- Login Form -->
                <form id="loginForm" action="" method="POST">
                    <h2>Login</h2>
                    <label for="login_email">Email</label>
                    <input type="email" id="login_email" name="login_email" required>
                    <label for="login_password">Password</label>
                    <input type="password" id="login_password" name="login_password" required>
                    <button type="submit" name="login">Login</button>
                    <p><a href="#">Forgot your password?</a></p>
                </form>

                <!-- Signup Form -->
                <form id="signupForm" action="" method="POST" style="display: none;">
                    <h2>Signup</h2>
                    <label for="signup_name">Name</label>
                    <input type="text" id="signup_name" name="signup_name" required>
                    <label for="signup_email">Email</label>
                    <input type="email" id="signup_email" name="signup_email" required>
                    <label for="signup_password">Password</label>
                    <input type="password" id="signup_password" name="signup_password" required>
                    <button type="submit" name="signup">Signup</button>
                </form>
            </div>
        </div>
    </div>

    <script src="login_signup.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
