<?php
session_start();
$error = "";

// Simulate fetching user credentials (this should come from your database)
$valid_user = [
    'email' => 'john@example.com',
    'password' => 'password123' // In reality, passwords should be hashed!
];

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password match the stored credentials
    if ($email === $valid_user['email'] && $password === $valid_user['password']) {
        $_SESSION['user'] = $email; // Start session for logged-in user
        header('Location: profile.php'); // Redirect to profile page after login
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>

        <!-- Display error message if login fails -->
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <div class="login-links">
            <a href="signup.php">Don't have an account? Sign up</a><br>
            <a href="forgot_password.php">Forgot your password?</a>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>
