<?php
session_start();
$error = "";
$success = "";

// Simulate fetching user details (this should come from your database)
$user = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'points' => 1200,
    'badges' => ['Eco Warrior', 'Recycler Pro']
];

// Handle profile update form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Simulate a database update (replace this with actual database logic)
    if ($name && $email) {
        $success = "Profile updated successfully!";
        // Update user session or database here
    } else {
        $error = "All fields are required.";
    }
}

// Handle account deletion (if needed)
if (isset($_POST['delete_account'])) {
    // Simulate account deletion (replace with actual logic)
    session_destroy();
    header('Location: goodbye.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h1>User Profile</h1>

        <!-- Display success or error messages -->
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php elseif ($success): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <h2>Edit Profile</h2>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" placeholder="Leave blank if unchanged">
            
            <button type="submit" name="update_profile">Update Profile</button>
        </form>

        <div class="points-badges">
            <h2>Your Achievements</h2>
            <p>Total Points: <strong><?php echo $user['points']; ?></strong></p>
            
            <h3>Badges:</h3>
            <ul>
                <?php foreach ($user['badges'] as $badge): ?>
                    <li><?php echo $badge; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
            <button type="submit" name="delete_account" class="delete-account">Delete Account</button>
        </form>
    </div>

    <script src="profile.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
